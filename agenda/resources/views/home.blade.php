@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <div id='calendar'></div>




                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <div class="jumbotron" class="center">
                            <button id="span" class="close">&times;</button>
                            <h2>Evento</h2>
                            <div class="form-group">
                                <div class="form-group">
                                    <span class="label-input100">Name:</span>
                                    <input class="input100 @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name">
                                    <br><br>
                                    <span class="label-input100">Data:</span>
                                    <input id="dataEvento" class="input100 @error('data') is-invalid @enderror" type="date" name="data" placeholder="Data" readonly>
                                    <br><br>
                                    <input id="dia_todo" type="radio" name="gender" value="dia_todo" checked>Todo o dia<br>
                                    <input type="radio" id="female" name="gender" value="intervalo">Definir hora de inico e de fim
                                    <br><br>
                                    <span class="label-input100">Local:</span>
                                    <input class="input100 @error('local') is-invalid @enderror" type="text" name="local" placeholder="Local">
                                    <br><br>
                                    <span class="label-input100">Url:</span>
                                    <input class="input100 @error('url') is-invalid @enderror" type="text" name="url" placeholder="Url do evento">
                                    <br><br>
                                    <span class="label-input100">Descriçao:</span>
                                    <input class="input100 @error('descricao') is-invalid @enderror" type="text" name="descricao" placeholder="Descriçao">
                                    <br><br>
                                    <div id="hora_inicio">
                                        <span class="label-input100">Hora Inicio:</span>
                                        <input class="input100 @error('hora_inicio') is-invalid @enderror" type="time" name="hora_inicio" placeholder="Hora de Inicio">
                                        <br><br>
                                        <span class="label-input100">Hora Fim:</span>
                                        <input class="input100 @error('hora_fim') is-invalid @enderror" type="time" name="hora_fim" placeholder="Hora de fim">
                                        <br><br>
                                    </div>
                                    <div>
                                        <button id="avEditar" class="btn btn-xs btn-primary">Criar Evento</button>
                                        <button id="btnCancelar" class="btn btn-xs btn-danger">Cancelar</button>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/agenda.js')}}"></script>
    <script src="{{ asset('js/modal.js')}}"></script>
@endsection