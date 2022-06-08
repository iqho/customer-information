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

    button.newItem {
        padding: 5px;
        margin: 14px 0 0 0;
        font-weight: bold;
        font-size: 16px;
    }
</style>
@endpush

@section('content')
<div class="container border border-gray" id="app" v-cloak>
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Add New Customer</h3>
                </div>

                <div class="card-body">
{{--
                    <form @submit.prevent="onSubmitForm"> --}}
                    <form action="{{ route('customers.store') }}" method="post">
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
                                        <th style="width:10%"><a class="btn btn-success" @click="AddItem"><i
                                                    class="fa-solid fa-plus fa-lg"></i></a></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr v-if="items.length > 0" v-for="(item, index) in items" :key="index">
                                        <td>@{{index + 1}}</td>
                                        <td><input type="number" min="1" v-model="item.code" name="codes[]" class="form-control" value="12291" required/>
                                        </td>
                                        <td><input type="text" v-model="item.name" name="names[]" class="form-control"
                                                placeholder="Full Name"  required/></td>
                                        <td><input type="number" v-model="item.age" name="ages[]" min="1" class="form-control"
                                                placeholder="Age" required /></td>
                                        <td>
                                            <select class="form-select" v-model="item.location" name="locations[]" required>
                                                <option value="" selected>Select Location</option>
                                                @foreach ($locations as $location)
                                                <option value="{{ $location->id }}">{{ $location->name }}</option>
                                                @endforeach
                                            </select>
                                        </td>
                                        <td><a class="btn btn-danger" @click="removeItem"><i
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
            items: [
                {
                code: '',
                name: '',
                age: '',
                location: ''
                }
            ]
            }
        },
        watch: {
            'items': {
            handler (newValue, oldValue) {
                newValue.forEach((item) => {
                item.total = item.quantity * item.amount
                })
            },
            deep: true
            }
        },
        methods: {
            AddItem(){
                this.items.push({
                    code: '',
                    name: '',
                    age: '',
                    location: ''
                })
            },
            removeItem(){
                this.items.splice(this.items, 1)
            },


        }
}).mount('#app')
</script>
@endpush
