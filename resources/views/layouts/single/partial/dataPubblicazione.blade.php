<div class="row">
    <div class="col-sm-12 testo">
        <small>
            @if($post->type != 'scuola')
                <div>Prima rappresentazione</div>
            @endif

            <div class="venue">
                @if(isset($post->teatro) && !empty($post->teatro))
                    <span class="teatro">{{$post->teatro}}, </span>
                @endif
                @if(isset($post->citta) && !empty($post->citta))
                    <span class="city">{{$post->citta}}</span>
                @endif
            </div>
            @php
                $mesi = array('gennaio', 'febbraio', 'marzo', 'aprile',
                                'maggio', 'giugno', 'luglio', 'agosto',
                                'settembre', 'ottobre', 'novembre','dicembre');
            @endphp
            <div class="date">
                @if($post->type != 'scuola')
                    {{-- <span class="dd">{{$post->data_di_pubblicazione->day}}</span> <span class="mm">{{$mesi[$post->data_di_pubblicazione->month - 1]}}</span> --}}
                @endif
                {{-- <span class="yy">{{$post->data_di_pubblicazione->year}}</span> --}}
            </div>
        </small>
    </div>
</div>
