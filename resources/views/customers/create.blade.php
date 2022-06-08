@extends('layouts.master')

@section('title', 'Add New Customer')

@section('content')
<div class="container border border-gray" id="app" v-cloak>
    <div>@{{ message }}</div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header text-center">
                    <h3>Add New Customer</h3>
                </div>

                <div class="card-body">
                    {{-- <div class="row" v-cloak>
                        <div v-if="message.length" class="alert alert-danger text-center p-2" role="alert">@{{ message
                            }}</div>
                    </div> --}}
                    <form @submit.prevent="onSubmitForm">
                        @csrf

                        <table>
                            <tr v-for="item in rowData" >
                                <th scope="row">@{{ item.code }}</th>
                                <td>@{{ item.name }}</td>
                                <td>@{{ item.age }}</td>
                                <td>@{{ item.area }}</td>
                            </tr>
                        </table>
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
      data() {
        return {
          message: 'Hello Vue!',
          code: '',
          name: '',
          age: '',
          area: ''
        }
      },
      methods:{
            addItem(){
                var my_object = {
                    code:this.code,
                    name:this.name,
                    age:this.age,
                    area: this.area
                };
                this.rowData.push(my_object)

                this.code = '';
                this.name = '';
                this.age = '';
                this.area = '';
            },
            onSubmitForm(){

            }
        }

    }).mount('#app')
</script>
@endpush
