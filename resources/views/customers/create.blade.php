@extends('layouts.master')

@section('title', 'Add New Customer')

@push('styles')
<style>
    table,
    tr,
    td {
        border: 1px solid rgb(170, 170, 170);
        text-align: center;
        vertical-align: middle;
    }
</style>
@endpush

@section('content')
<div class="container border border-gray p-2" id="app" v-cloak>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Add New Customer</h3>
                </div>

                <div class="card-body">

                    <div v-if="success.length" class="alert alert-success alert-dismissible fade show text-center p-2 m-0 mb-2" role="alert">
                        @{{ success }}
                        <button type="button" class="btn-close p-1 mt-1 m-0" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <div v-for="(errors, field) in allerrors" class="row alert alert-danger alert-dismissible fade show mb-1 text-center m-0 p-0" role="alert">
                        <div v-for="(error, i) in errors" class="p-2 m-0">
                            @{{ error }}
                        </div>
                        <button type="button" class="btn-close p-1 mt-1 m-0" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>

                    <form @submit.prevent="onSubmitForm" class="mt-2">
                        @csrf

                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th style="width:5%">#</th>
                                        <th style="width:20%">Code</th>
                                        <th style="width:35%">Full Name</th>
                                        <th style="width:10%">Age</th>
                                        <th style="width:20%">Location</th>
                                        <th style="width:10%">
                                            <a class="btn btn-success" v-on:click="AddCustomer">
                                                <i class="fa-solid fa-plus fa-lg"></i>
                                            </a>
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="customers.length > 0" v-for="(customer, index) in customers" :key="index">
                                        <td>@{{index + 1}}</td>
                                        <td>
                                            <input type="number" min="1" v-model="customer.code" class="form-control" :class="hasError[index]" required readonly>
                                        </td>
                                        <td>
                                            <input type="text" v-on:keyup="removeError(index)" :class="hasError[index]" v-model="customer.name" class="form-control" placeholder="Full Name" required autofocus />
                                        </td>
                                        <td>
                                            <input type="number" v-on:change="removeError(index)" v-model="customer.age" min="1" class="form-control" :class="hasError[index]" placeholder="Age" required />
                                        </td>
                                        <td>
                                            <select class="form-select" v-model="customer.area_id" :class="hasError[index]" v-on:change="removeError(index)" required>
                                                <option value="" selected>Select Location</option>
                                                @foreach ($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><a class="btn btn-danger" v-on:click="removeCustomer(index)"><i
                                                    class="fa-solid fa-minus"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td colspan="6">
                                            <button type="submit" class="btn btn-primary btn-lg">Add Customers</button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('script')
<script>
    const { createApp } = Vue

    createApp({
        data(){
            return {
                customers: [{
                    code: '',
                    name: '',
                    age: '',
                    area_id: '',
                }],
                success: '',
                allerrors: [],
                hasError: [],
            }
        },

        watch: {
            'customers': {
                handler (newValue, oldValue) {
                    newValue.forEach((customer, i) => {
                        const url = "{{ route('customers.checkCode') }}";
                        if(customer.area_id){
                            axios.post( url, { id: customer.area_id })
                            .then(response => {
                                customer.code = Number(response.data.success)+i;
                            });
                        }
                    })
                },
            deep: true
            }
        },

        methods: {
            AddCustomer(){
                this.customers.push({
                    code: '',
                    name: '',
                    age: '',
                    area_id: ''
                })
            },

            removeCustomer(index){
                this.customers.splice(index, 1)
            },

           removeError(index){
                 this.hasError[index] = '';
            },

            async onSubmitForm(){

                let thisV = this ;

                this.customers.forEach(function(e, i) {
                  if(e.code == '' || e.name == '' || e.age == '' || e.area_id == ''){
                    thisV.hasError[i] = 'border border-danger border-2';
                  }
              });

                const url = "{{ route('customers.store') }}";
                const customers = JSON.stringify({customers:this.customers});
                const config = {
                    headers: {'Content-Type': 'application/json'}
                }

                await axios.post(url, customers, config)
                .then((response) => {
                    this.allerrors = '';
                    this.success = response.data.success;

                    setTimeout(()=>{
                        this.success = '';
                    }, 5000);

                    this.customers.forEach(function(e) {
                        e.code = '';
                        e.name = '';
                        e.age = '';
                        e.area_id = '';
                        });

                    //setTimeout(() => window.location.reload(), 3000);
                })
                 .catch(error => {
                    this.allerrors = error.response.data.errors;

                    setTimeout(()=>{
                        this.allerrors = '';
                    }, 10000);
                });
            }

        }

    }).mount('#app')

</script>
@endpush
