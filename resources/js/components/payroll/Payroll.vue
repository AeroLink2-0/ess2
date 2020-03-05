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

            const rectX = 10
            const rectY = 70
            const rectW = 575
            const rectH = 110
            pdf.setFillColor(255,255,255,255)
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
            pdf.setFontSize(13);
            pdf.text("De Santa Tower, Rockford Hills, Los Santos",70,45);
            
            pdf.setFontType("normal");
            pdf.setFont("helvetica");
            pdf.setFontSize(12);
            pdf.text("Employee Number:", rectX + 5,rectY + 20);
            pdf.text("Fullname:", rectX + 5,rectY + 40);
            pdf.text("Job Title:", rectX + 5,rectY + 60);
            pdf.text("Department:", rectX + 5,rectY + 80);
            pdf.text("Days Worked:", rectX + 5,rectY + 100);

            pdf.setFontType("bold");
            pdf.setFontSize(12);
            pdf.text(item.employee_id, rectX * 13,rectY + 20);
            pdf.text(item.FullName, rectX * 13,rectY + 40);
            pdf.text(item.basic_information.emp_details.emp_position.position, rectX * 13,rectY + 60);
            pdf.text(item.basic_information.emp_details.emp_position.department.department, rectX * 13,rectY + 80);
            pdf.text(item.duration, rectX * 13,rectY + 100);
            pdf.save() 
       }); 
    },

  }
};
</script>