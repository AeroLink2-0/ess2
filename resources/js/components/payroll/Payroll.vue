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
                                            :items="devs"
                                            class="elevation-1" 
                                            :search="search"
                                            hide-actions
                                            >
                                            <template v-slot:items="props">
                                                <td class="text-xs-right">{{ props.item.firstname }}</td>
                                            </template>
                                            <template v-slot:no-data>
                                                <v-alert :value="true" color="error" icon="warning">
                                                    Sorry, nothing to display here :(
                                                </v-alert>
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
    export default {
            data () {
            return {
                search: '',
                pagination: {},
                selected: [],
                headers: [
                    {
                        text: 'Firstname',
                        align: 'left',
                        sortable: true,
                        value: 'firstname',
                    },
                    {
                        text: 'Middlename',
                        align: 'left',
                        sortable: true,
                        value: 'middlename',
                    },
                     {
                        text: 'Lastname',
                        align: 'left',
                        sortable: true,
                        value: 'lastname',
                    },
                     {
                        text: 'Job Title',
                        align: 'left',
                        sortable: true,
                        value: 'job_title',
                    },
                ],
                devs: [
                    {
                        firstname: 'Cedric',
                        middlename: 'C',
                        lastname: 'Coloma',
                        job_title: 'Java Developer',
                    },
                    {
                        firstname: 'Ariel',
                        middlename: 'C',
                        lastname: 'Lecias',
                        job_title: 'Software Engineer',
                    },
                    {
                        firstname: 'Ma. Eden',
                        middlename: 'M',
                        lastname: 'Ramoneda',
                        job_title: 'Web Developer',
                    },
                    {

                    }
                ]
            }
        },
    }

</script>