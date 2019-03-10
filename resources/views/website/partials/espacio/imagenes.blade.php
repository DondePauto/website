<div class="row">
    <div class="section-header lightblue" id="header-imagenes">
        <i class="fa fa-fw fa-lg fa-picture-o"></i>&nbsp;Imágenes
    </div>
    @if( $espacio->data->video )
        <div class="section-header" id="header-video">
            <i class="fa fa-fw fa-lg fa-video-camera"></i>&nbsp;Video
        </div>
    @endif
    <div class="col-12 col-sm-8">
        <div class="carousel slide" id="carousel-imagenes" data-ride="carousel">
            <ol class="carousel-indicators">
                @foreach( $espacio->images as $imagen )
                    <li data-target="#carousel-imagenes" data-slide-to="{{ $loop->index }}" {{ $loop->first ? 'class=active' : '' }}></li>
                @endforeach
            </ol>
            <div class="carousel-inner">
                @foreach( $espacio->images as $imagen )
                    <div class="carousel-item {{ $loop->first ? 'active' : '' }}" style="background-image: url({{ $imagen }})"></div>
                @endforeach
            </div>
        </div>
        @if( $espacio->data->video )
            <?php $video = preg_replace('/watch\?v=/', 'embed/', $espacio->data->video).'?showinfo=0'; ?>
            <div class="embed-responsive embed-responsive-16by9" id="espacio-video" style="display: none;">
                <iframe class="embed-responsive-item" src="{{ $video }}" allowfullscreen></iframe>
            </div>
        @endif
    </div>

    <style type="text/css">
        #carousel-imagenes,
        #espacio-video {
            margin-bottom: 25px;
        }
        #carousel-imagenes .carousel-item {
            background-color: white;
            background-repeat: no-repeat;
            background-size: contain;
            background-position: center;
        }
        #carousel-imagenes .carousel-indicators {
            bottom: -37.5px;
        }
        #carousel-imagenes .carousel-indicators li {
            width: 16px;
            height: 16px;
            border-radius: 100%;
            background-color: {{ config('dondepauto.colores.lightgray') }};
            cursor: pointer;
        }
        #carousel-imagenes .carousel-indicators li.active {
            background-color: {{ config('dondepauto.colores.lightblue') }};
        }
        @if( $espacio->data->video )
            #header-imagenes,
            #header-video {
                width: calc(50% - 15px);
                cursor: pointer;
            }
            #header-imagenes {
                margin-right: 0;
            }
            #header-video {
                margin-left: 0;
            }
            @media(min-width: 576px) {
                #header-imagenes,
                #header-video {
                    width: calc(33.3333% - 15px);
                }
            }
        @endif
    </style>
</div>
