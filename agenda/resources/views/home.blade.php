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


                    <div class="modal fade" id='eventDetails' >
                        <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">&times;</button>
                            <h4 class="modal-title" id="eventTitleDetail"></h4>
                            </div>
                            <div class="modal-body">
                                <span class="label-input100">Name:</span>
                                <input id="eventoNameDetail" class="input100 @error('name') is-invalid @enderror" type="text" name="name" svalue="" readonly>
                                <br><br>
                                <span class="label-input100">Data:</span>
                                <input id="eventoDataDetail" class="input100 @error('data') is-invalid @enderror" type="date" name="data" placeholder="Data" readonly>
                                <br><br>
                                <span class="label-input100">Local:</span>
                                <input id="eventolocalDetail" class="input100 @error('local') is-invalid @enderror" type="text" name="local" placeholder="Local" readonly>
                                <br><br>
                                <span class="label-input100">Descriçao:</span>
                                <input id="eventodescricaoDetail" class="input100 @error('descricao') is-invalid @enderror" type="text" name="descricao" placeholder="Descriçao" readonly>
                                <br><br>
                                <div id="hora_inicio">
                                <span class="label-input100">Hora Inicio:</span>
                                <input id="eventoHoraInicioDetail" class="input100 @error('hora_inicio') is-invalid @enderror" type="time" name="hora_inicio" placeholder="Hora de Inicio" readonly>
                                <br><br>
                                <span class="label-input100">Hora Fim:</span>
                                <input id="eventoHoraFimDetail" class="input100 @error('hora_fim') is-invalid @enderror" type="time" name="hora_fim" placeholder="Hora de fim" readonly>
                                <br><br>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" id="btnRemoverEvent" class="btn btn-xs btn-primary">Remover Evento</button>
                                <button id="btnCancelarEventDetail" class="btn btn-xs btn-danger">Cancelar</button>
                            </div>
                        </div>
                        
                        </div>
                    </div>


                    <!-- The Modal -->
                    <div id="myModal" class="modal">
                        <div class="jumbotron" class="center">
                            <button id="span" class="close">&times;</button>
                            <form class="login100-form validate-form" method="POST" action="{{ route('create.event') }}">
                                @csrf
                                <h2>Evento</h2>
                                <div class="form-group">
                                    <div class="form-group">
                                        <span class="label-input100">Name:</span>
                                        <input class="input100 @error('name') is-invalid @enderror" type="text" name="name" placeholder="Name" required>
                                        <br><br>
                                        <span class="label-input100">Data:</span>
                                        <input id="dataEvento" class="input100 @error('data') is-invalid @enderror" type="date" name="data" placeholder="Data" readonly>
                                        <br><br>
                                        <input id="dia_todo" type="radio" name="duration" value="dia_todo" checked>Todo o dia<br>
                                        <input type="radio" id="female" name="duration" value="intervalo">Definir hora de inico e de fim
                                        <br><br>
                                        <span class="label-input100">Local:</span>
                                        <input class="input100 @error('local') is-invalid @enderror" type="text" name="local" placeholder="Local" required>
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
                                            <button type="submit" id="btnCriar" class="btn btn-xs btn-primary">Criar Evento</button>
                                            <button id="btnCancelar" class="btn btn-xs btn-danger">Cancelar</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group">
                                </div>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('script')
    <script>
        var userID = {!! json_encode(Auth::user()->id) !!};
    </script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.js" integrity="sha256-DrT5NfxfbHvMHux31Lkhxg42LY6of8TaYyK50jnxRnM=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/agenda.js')}}">
        
    </script>
    <script src="{{ asset('js/modal.js')}}"></script>
@endsection