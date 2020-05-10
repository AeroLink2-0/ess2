<template>
    <v-app>
        <div class="content-wrapper">
        <section class="content-header">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1>Payroll</h1>
                        </div>
                        <div class="col-sm-6">
                            <ol class="breadcrumb float-sm-right">
                                <li class="breadcrumb-item"><a href="#">Home</a></li>
                                <li class="breadcrumb-item active">Payroll</li>
                            </ol>
                        </div>
                    </div>
                </div><!-- /.container-fluid -->
            </section>

            <section class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-outline">
                                <div class="card-body">
                                    <v-text-field
                                            v-model="search"
                                            label="Search"
                                            single-line
                                            hide-details
                                        ></v-text-field><br>
                                       <v-data-table
                                            :headers="headers"
                                            :items="emps"
                                            sort-by="created_at"
                                            class="elevation-1"
                                            :search="search"
                                            hide-default-footer
                                        >
                                            <template>
                                                <v-card>

                                                    <v-card-text>
                                                    <v-container>
                                                        <v-row>
                                                        <v-col cols="12" sm="6" md="4">
                                                            <v-text-field v-model="emps.name" label="Duration"></v-text-field>
                                                        </v-col>
                                                        </v-row>
                                                    </v-container>
                                                    </v-card-text>
                                                </v-card>
                                            </template>
                                            <template v-slot:item.payslip="{ item }">
                                            <v-icon
                                                small
                                                class="mr-2"
                                                @click="printPayslip(item)"
                                            >
                                                fa fa-file
                                            </v-icon>
                                            </template>
                                        </v-data-table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <table id="payslip-table" style="display:none">
            </table>
        </div>
    </v-app>
</template>

<script>
/*export default {
  data() {
    return {
      emps: {}
    };
  },
  methods: {
    empPayrollInfo() {
      axios
        .get("mypayroll")
        .catch(err => console.log(err))
        .then(data => {
          this.emps = data.data;
        //  console.log(data.data);
        });
    }
  },
  mounted() {
    this.empPayrollInfo();
  }
};*/
import jsPDF from 'jspdf'
import 'jspdf-autotable'
export default {
  data: () => ({
    search: "",
    dialog: false,
    headers: [
      {
        text: "Days Worked",
        align: "left",
        sortable: true,
        value: "duration"
      },
      { text: "Payslip", value: "payslip", sortable: false }
    ],
    emps: [],
  }),
  created() {
    this.empPayrollInfo();
  },

  methods: {
    empPayrollInfo() {
      axios
        .get("mypayroll")
        .catch(err => console.log(err))
        .then(data => {
          this.emps = data.data;
          //  console.log(data.data);
        });
    },
    printPayslip (item) {
     axios
        .get("printPayslip/" + item.id)
        .catch(error => {
          console.log(error);
        })
        .then(response => {
            const pdf = new jsPDF({
            orientation: "p",
            unit: "pt",
            format: "a4",
            });

            const rectX = 20
            const rectY = 70
            const rectW = 550
            const rectH = 110
            pdf.rect(rectX,rectY,rectW,rectH,'S')
            
            var img = new Image()
            img.src = 'uploads/aerolink.png'
            pdf.addImage(img, 'png', 10,10,50,50);
            
            pdf.setTextColor(31, 46, 46)
            pdf.setFontType("bold");
            pdf.setFont("helvetica");
            pdf.setFontSize(18);
            
            pdf.text("Aerolink",70,30);

            pdf.setTextColor(41, 61, 61)
            pdf.setFontType("normal");
            pdf.setFont("helvetica");
            pdf.setFontSize(11);
            pdf.text("30th floor, De Santa Tower, corner Time Square, Los Santos",70,45);
            
            pdf.setFontType("normal");
            pdf.setFont("helvetica");
            pdf.setFontSize(10);
            pdf.text("Employee Number:", rectX + 5,rectY + 20);
            pdf.text("Fullname:", rectX + 5,rectY + 40);
            pdf.text("Job Title:", rectX + 5,rectY + 60);
            pdf.text("Department:", rectX + 5,rectY + 80);
            pdf.text("Days Worked:", rectX + 5,rectY + 100);

            pdf.setFontType("bold");
            pdf.setFontSize(10);
            pdf.text(item.employee_id, rectX * 7,rectY + 20);
            pdf.text(item.FullName, rectX * 7,rectY + 40);
            pdf.text(item.basic_information.emp_details.emp_position.position, rectX * 7,rectY + 60);
            pdf.text(item.basic_information.emp_details.emp_position.department.department, rectX * 7,rectY + 80);
            pdf.text(item.duration, rectX * 7,rectY + 100);

            pdf.autoTable({ startY:rectY * 2.7})
            pdf.autoTable({
                head: [['Earnings', 'Deductions']],
                body: [
                ['Basic:                      ' + item.basic, 'Undertime:                ' + item.undertime],
                ['Overtime:                 ' + item.overtime,'Late:                          ' + item.late],
                ['Allowance:               ' + item.allowance, 'Absent:                      ' +  item.absent],
                ['                                           ','SSS:                          ' +  item.sss_no],
                ['                                           ','PAGIBIG:                  ' +  item.pag_ibig_no],
                ['                                           ','Philhealth:                 ' +  item.philhealth_no],
                ['                                           ','Coop:                         ' +  item.coop],
                ['                                          ','W/hold Tax:               ' +  item.whold_tax],
                ['                                           ','Cash Advance:          ' +  item.cash_advance],
                ['                                           ','SSS Loan:                 ' +  item.sss_loan],
                ['                                           ','Pagibig Loan:            ' +  item.pag_ibig_loan],
                ['                                           ','Coop Loan:               ' +  item.coop_loan],
                ],
            })

            var total_earnings = item.basic + item.overtime + item.allowance;
            var total_deductions = item.undertime + item.late + item.sss_no + item.pag_ibig_no 
            + item.philhealth_no + item.coop + item.whold_tax + item.sss_loan + item.pag_ibig_loan 
            + item.coop_loan + item.cash_advance;

            pdf.autoTable({ startY:rectY * 6.7 })
            pdf.autoTable({
                head: [['Total',' ']],
                body: [
                    ['Total Earnings:         ' + total_earnings,'Total Deductions:      ' + total_deductions],
                    ['                                               ','NET PAY:          ' + (total_earnings - total_deductions)],
                ],
            })

            pdf.save() 
       }); 
    },

  }
};
</script>