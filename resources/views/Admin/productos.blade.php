@extends('Admin.admin_layout')
@section('content')

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Dashboard <small>Panel de Productos</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> Productos
                            </li>
                        </ol>
                    </div>
                </div>

                    <div class="col-lg-12">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Productos</h3>
                            </div>
                            <div class="panel-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered table-hover table-striped">
                                        <thead>
                                            <tr>
                                                <th>No #</th>
                                                <th>Nombre</th>
                                                <th>estado</th>
                                                <th>Mas ...</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td>3326</td>
                                                <td>10/21/2013</td>
                                                <td>3:29 PM</td>
                                                <td> <a href="#">en token</a> <a href="#">agregar imagen</a> <a href="#">Consultar</a> </td>
                                            </tr>
                                            <tr>
                                                <td>3325</td>
                                                <td>10/21/2013</td>
                                                <td>3:20 PM</td>
                                                <td> <a href="#">en token</a> <a href="#">agregar imagen</a> <a href="#">Consultar</a> </td>
                                            </tr>
                                            <tr>
                                                <td>3324</td>
                                                <td>10/21/2013</td>
                                                <td>3:03 PM</td>
                                                <td> <a href="#">en token</a> <a href="#">agregar imagen</a> <a href="#">Consultar</a> </td>
                                            </tr>
                                            <tr>
                                                <td>3323</td>
                                                <td>10/21/2013</td>
                                                <td>3:00 PM</td>
                                                <td> <a href="#">en token</a> <a href="#">agregar imagen</a> <a href="#">Consultar</a> </td>
                                            </tr>
                                            <tr>
                                                <td>3322</td>
                                                <td>10/21/2013</td>
                                                <td>2:49 PM</td>
                                                <td> <a href="#">en token</a> <a href="#">agregar imagen</a> <a href="#">Consultar</a> </td>
                                            </tr>
                                            <tr>
                                                <td>3321</td>
                                                <td>10/21/2013</td>
                                                <td>2:23 PM</td>
                                                <td> <a href="#">en token</a> <a href="#">agregar imagen</a> <a href="#">Consultar</a> </td>
                                            </tr>
                                            <tr>
                                                <td>3320</td>
                                                <td>10/21/2013</td>
                                                <td>2:15 PM</td>
                                                <td> <a href="#">en token</a> <a href="#">agregar imagen</a> <a href="#">Consultar</a> </td>
                                            </tr>
                                            <tr>
                                                <td>3319</td>
                                                <td>10/21/2013</td>
                                                <td>2:13 PM</td>
                                               <td> <a href="#">en token</a> <a href="#">agregar imagen</a> <a href="#">Consultar</a> </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <div class="text-right">
                                    <a href="#"># <i class="fa fa-arrow-circle-right"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
@endsection
