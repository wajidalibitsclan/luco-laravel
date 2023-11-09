<div class="container">
    <div class="row">

        <div class="col-sm-12">

            <h3>Le parole di Luca Ronconi</h3>
            <div class="dichiarazioni">
                @if(isset($post->interviste_e_dichiarazioni['file']))
                <div class="interview">
                    <div class="row">
                        @foreach($post->interviste_e_dichiarazioni['file'] as $file)
                            @if(isset($file['id']) && !empty($file['id']))
                                <div class="pdf-link">
                                    <a href="{{getFileUrlFromId($file['id'])}}" title="" target="_blank">
                                        <i class="fa fa-file-pdf-o"></i> {{$file['etichetta_documento'] or getFileTitleFromId($file['id'])}}
                                    </a>
                                </div>
                           @endif
                        @endforeach
                    </div>
                </div>
                @endif
                @if(isset($post->interviste_e_dichiarazioni['elenco']))
                @foreach($post->interviste_e_dichiarazioni['elenco'] as $intervista)

                    <div class="interview">
                        <div class="row">
                            @if(isset($intervista['titolo_intervista']) && !empty($intervista['titolo_intervista']))
                                <div class="col-sm-10 col-sm-push-2">
                                    <h4 class="interview-title">{{$intervista['titolo_intervista']}}</h4>
                                </div>
                            @endif
                            <br>
                            @if(isset($intervista['domanda_risposta']) && !empty($intervista['domanda_risposta']))
                                <div class="col-sm-10 col-sm-push-2 interview-block">
                                    @foreach($intervista['domanda_risposta'] as $domanda_risposta)
                                        @if(isset($domanda_risposta['domanda_intervista']) && !empty($domanda_risposta['domanda_intervista']))
                                            <div class="question">
                                                {{$domanda_risposta['domanda_intervista']}}
                                            </div>
                                        @endif
                                        @if(isset($domanda_risposta['risopsta_intervista'])  && !empty($domanda_risposta['risopsta_intervista']))
                                            <div class="answer parole-di-ronconi">
                                                {{$domanda_risposta['risopsta_intervista']}}
                                            </div>
                                        @endif
                                    @endforeach
                                </div>
                            @endif
                            <div class="col-sm-2 col-sm-pull-10 interview-details">
                                @if(isset($intervista['autore']) && !empty($intervista['autore']))
                                    <div class="interviewer">{{$intervista['autore']}}</div>
                                @endif
                                @if(isset($intervista['testata']) && !empty($intervista['testata']))
                                    <div class="newspaper">«{{$intervista['testata']}}»</div>
                                @endif
                                @if(isset($intervista['data']) && !empty($intervista['data']))
                                    <div class="interview-date">{{$intervista['data']}}</div>
                                @endif
                            </div>

                        </div>
                    </div>
                @endforeach
                @endif
            </div>
        </div>
    </div>
</div>