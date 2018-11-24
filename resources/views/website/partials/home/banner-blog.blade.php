<div class="row text-center" id="banner-blog">
    <div class="full-width">
        <a href="/blog" style="text-decoration: none; cursor: pointer;">
            <img src="images/home/icon-blog.png" class="header-icon">
            <h2 class="h2">Nuestro blog</h2>
        </a>
        <p>Lee nuestros artículos y conoce nuestra visión del marketing, la publicidad y la comercialización de espacios publicitarios.</p>
        <div class="row">
            @foreach( DondePauto\Models\Extras\Blog::ultimos(4) as $blog )
                <div class="col-12 col-sm-6">
                    <div class="card card-blog">
                        <div class="row">
                            <div class="col-12 col-sm-6">
                                <div class="card-img-top" style="background-image: url(//files.dondepauto.co/{{ $blog->miniatura }});"></div>
                            </div>
                            <div class="col-12 col-sm-6">
                                <div class="card-body">
                                    <div class="fecha">{{ $blog->fecha }}</div>
                                    <div class="card-title">
                                        <b>{{ $blog->titulo }}</b>
                                    </div>
                                    <a href="/blog/{{ $blog->slug }}" type="button" class="btn btn-danger btn-leer">
                                        <b>Leer</b>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

    <style type="text/css">
        #banner-blog {
            background-image: url(images/home/banner-blog.png);
        }
        #banner-blog .full-width {
            padding: 15px;
        }
        #banner-blog .h2 {
            color: {{ config('dondepauto.colores.lightblue') }};
        }
        #banner-blog .full-width>.row {
            margin-right: -7.5px;
            margin-left: -7.5px;
        }
        #banner-blog .full-width>.row>div {
            padding: 0 7.5px;
        }
        @media(min-width: 576px) {
            #banner-blog .full-width>.row {
                margin-right: calc(5% - 7.5px);
                margin-left: calc(5% - 7.5px);
            }
            #banner-blog p {
                margin-right: calc(5% - 7.5px);
                margin-left: calc(5% - 7.5px);
                font-size: 1.5rem;
            }
        }
    </style>
</div>
