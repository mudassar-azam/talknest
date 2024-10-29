@extends('layouts.front.main')
@section('content')
    <style>
        .active > .page-link,
        .page-link.active {
            background-color: #93B74B;
            border-color: #93B74B;
        }

        .page-link {
            color: #93B74B;
        }

        .page-link:hover {
            color: #5A5A5A;

        .paginator .page-item {
            color: rgb(0, 0, 0);
        }

        .comment-heading {
            margin-left: 3rem;
        }

        .commentArea {
            display: flex;
        }

        .single-comment {
            background-color: #1B222D;
            padding: 1rem;
            width: 85vh;

        }

        .single-comment .comment-info {
            margin-bottom: 0.5rem;
            margin-left: 1rem;
            font-size: 1.2rem;

        }

        .single-comment .comment-time {
            margin-top: 0.5rem;
            color: #bdd58e;
        }

        .single-comment .text {
            margin-left: 2rem;
        }


        .comment-form-wrap {
            display: flex;
            width: 100%;
            margin-left: auto;
            margin-right: auto;
        }

        .comment-input {
            flex: 1;
            padding: 20px 15px;
            font-size: 1.1em;
            border-top-left-radius: 10px;
            border-bottom-left-radius: 10px;
            box-shadow: none;
            border: none;
            box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.19);
            outline: none;
        }

        .comment-submit {
            padding-right: 10px;
            background-color: #fff;
            border-top-right-radius: 10px;
            border-bottom-right-radius: 10px;
            box-shadow: 5px 4px 6px rgba(0, 0, 0, 0.19);
            border: none;
            cursor: pointer;
            cursor: hand;
        }

        .comment-submit span {
            margin-left: 50px;
            padding: 18px 45px;
            font-size: 0.9em;
            text-transform: uppercase;
            font-weight: 300;
            color: #fff;
            background-color: #F54E59;
            border-radius: 20px;
            box-shadow: 2px 4px 6px rgba(0, 0, 0, 0.19);
        }

        .comment-submit span:hover {
            background-color: #d6121f;
            box-shadow: 2px 2px 4px rgba(0, 0, 0, 0.19);
        }

        .unique-container {
            display: flex;
            justify-content: space-between;
        }


        .unique-content {
            display: flex;
            align-items: center;
            justify-content: center;
            position: relative;
            color: #161616;
            width: 110px;
            padding: 1px;

        }


        .unique-arrow {
            height: 20px;
            fill: white;
            margin-right: 5px;
        }

        .unique-arrow.reverse {
            transform: scaleX(-1);
            margin-left: 5px;
            margin-right: 0;
        }

        .unique-title {
            font-size: 1em;
            color: white;
        }


        .unique-content:hover {
            border: 1px solid white;
            border-radius: 10px;
            padding: 0;
            cursor: pointer;
        }
              .avatar {
                            position: relative;
                            display: inline-block;
                            width: 3rem;
                            height: 3rem;
                            font-size: 1.25rem;
                        }

                        .avatar-img,
                        .avatar-initials,
                        .avatar-placeholder {
                            width: 100%;
                            height: 100%;
                            border-radius: inherit;
                        }

                        .avatar-img {
                            display: block;
                            -o-object-fit: cover;
                            object-fit: cover;
                        }

                        .avatar-initials {
                            position: absolute;
                            top: 0;
                            left: 0;
                            display: -ms-flexbox;
                            display: flex;
                            -ms-flex-align: center;
                            align-items: center;
                            -ms-flex-pack: center;
                            justify-content: center;
                            color: #fff;
                            line-height: 0;
                            background-color: #a0aec0;
                        }

                        .avatar-placeholder {
                            position: absolute;
                            top: 0;
                            left: 0;
                            background: #a0aec0 url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='%23fff' d='M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z'/%3e%3c/svg%3e") no-repeat center/1.75rem;
                        }

                        .avatar-indicator {
                            position: absolute;
                            right: 0;
                            bottom: 0;
                            width: 20%;
                            height: 20%;
                            display: block;
                            background-color: #a0aec0;
                            border-radius: 50%;
                        }

                        .avatar-group {
                            display: -ms-inline-flexbox;
                            display: inline-flex;
                        }

                        .avatar-group .avatar+.avatar {
                            margin-left: -0.75rem;
                        }

                        .avatar-group .avatar:hover {
                            z-index: 1;
                        }

                        .avatar-sm,
                        .avatar-group-sm>.avatar {
                            width: 2.125rem;
                            height: 2.125rem;
                            font-size: 1rem;
                        }

                        .avatar-sm .avatar-placeholder,
                        .avatar-group-sm>.avatar .avatar-placeholder {
                            background-size: 1.25rem;
                        }

                        .avatar-group-sm>.avatar+.avatar {
                            margin-left: -0.53125rem;
                        }

                        .avatar-lg,
                        .avatar-group-lg>.avatar {
                            width: 4rem;
                            height: 4rem;
                            font-size: 1.5rem;
                        }

                        .avatar-lg .avatar-placeholder,
                        .avatar-group-lg>.avatar .avatar-placeholder {
                            background-size: 2.25rem;
                        }

                        .avatar-group-lg>.avatar+.avatar {
                            margin-left: -1rem;
                        }

                        .avatar-light .avatar-indicator {
                            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
                        }

                        .avatar-group-light>.avatar {
                            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
                        }

                        .avatar-dark .avatar-indicator {
                            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.25);
                        }

                        .avatar-group-dark>.avatar {
                            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.25);
                        }

                        / Font not working in <textarea>for this version of bs / textarea {
                            font-family: inherit;
                        }
    </style>
    @auth
        <div class="container-fluid">
            <div class="" style="width:94%; margin:0 auto;">
                <div class="row" style="margin:0 auto;">
                    <div class="col-md-3 dashboardleft">
                        <!--<h4 class="myportfolio">My Nests</h4>-->
                          <select class="form-select fs-4 mb-3" aria-label=".form-select-lg example" id="categorySelect">
                            <option selected>My Nests</option>
                            @foreach($categories as $category)
                                <option value="{{ route('frontblog', ['id' => $category->id]) }}">{{$category->name}}</option>
                            @endforeach
                        </select>
                        <!--<h4 class="marketoverview">Market Overview</h4>-->
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            {{-- <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                                    rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on
                                        TradingView</span></a></div> --}}
                            <script type="text/javascript"
                                    src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js"
                                    async>
                                {
                                    "colorTheme"
                                :
                                    "dark",
                                        "dateRange"
                                :
                                    "12M",
                                        "showChart"
                                :
                                    true,
                                        "locale"
                                :
                                    "en",
                                        "largeChartUrl"
                                :
                                    "",
                                        "isTransparent"
                                :
                                    false,
                                        "showSymbolLogo"
                                :
                                    true,
                                        "showFloatingTooltip"
                                :
                                    false,
                                        "width"
                                :
                                    "100%",
                                        "height"
                                :
                                    "660",
                                        "plotLineColorGrowing"
                                :
                                    "rgba(41, 98, 255, 1)",
                                        "plotLineColorFalling"
                                :
                                    "rgba(41, 98, 255, 1)",
                                        "gridLineColor"
                                :
                                    "rgba(240, 243, 250, 0)",
                                        "scaleFontColor"
                                :
                                    "rgba(106, 109, 120, 1)",
                                        "belowLineFillColorGrowing"
                                :
                                    "rgba(41, 98, 255, 0.12)",
                                        "belowLineFillColorFalling"
                                :
                                    "rgba(41, 98, 255, 0.12)",
                                        "belowLineFillColorGrowingBottom"
                                :
                                    "rgba(41, 98, 255, 0)",
                                        "belowLineFillColorFallingBottom"
                                :
                                    "rgba(41, 98, 255, 0)",
                                        "symbolActiveColor"
                                :
                                    "rgba(41, 98, 255, 0.12)",
                                        "tabs"
                                :
                                    [{
                                        "title": "Indices",
                                        "symbols": [{
                                            "s": "FOREXCOM:SPXUSD",
                                            "d": "S&P 500"
                                        },
                                            {
                                                "s": "FOREXCOM:NSXUSD",
                                                "d": "US 100"
                                            },
                                            {
                                                "s": "FOREXCOM:DJI",
                                                "d": "Dow 30"
                                            },
                                            {
                                                "s": "INDEX:NKY",
                                                "d": "Nikkei 225"
                                            },
                                            {
                                                "s": "INDEX:DEU40",
                                                "d": "DAX Index"
                                            },
                                            {
                                                "s": "FOREXCOM:UKXGBP",
                                                "d": "UK 100"
                                            }
                                        ],
                                        "originalTitle": "Indices"
                                    },
                                        {
                                            "title": "Futures",
                                            "symbols": [{
                                                "s": "CME_MINI:ES1!",
                                                "d": "S&P 500"
                                            },
                                                {
                                                    "s": "CME:6E1!",
                                                    "d": "Euro"
                                                },
                                                {
                                                    "s": "COMEX:GC1!",
                                                    "d": "Gold"
                                                },
                                                {
                                                    "s": "NYMEX:CL1!",
                                                    "d": "Crude Oil"
                                                },
                                                {
                                                    "s": "NYMEX:NG1!",
                                                    "d": "Natural Gas"
                                                },
                                                {
                                                    "s": "CBOT:ZC1!",
                                                    "d": "Corn"
                                                }
                                            ],
                                            "originalTitle": "Futures"
                                        },
                                        {
                                            "title": "Bonds",
                                            "symbols": [{
                                                "s": "CME:GE1!",
                                                "d": "Eurodollar"
                                            },
                                                {
                                                    "s": "CBOT:ZB1!",
                                                    "d": "T-Bond"
                                                },
                                                {
                                                    "s": "CBOT:UB1!",
                                                    "d": "Ultra T-Bond"
                                                },
                                                {
                                                    "s": "EUREX:FGBL1!",
                                                    "d": "Euro Bund"
                                                },
                                                {
                                                    "s": "EUREX:FBTP1!",
                                                    "d": "Euro BTP"
                                                },
                                                {
                                                    "s": "EUREX:FGBM1!",
                                                    "d": "Euro BOBL"
                                                }
                                            ],
                                            "originalTitle": "Bonds"
                                        },
                                        {
                                            "title": "Forex",
                                            "symbols": [{
                                                "s": "FX:EURUSD",
                                                "d": "EUR/USD"
                                            },
                                                {
                                                    "s": "FX:GBPUSD",
                                                    "d": "GBP/USD"
                                                },
                                                {
                                                    "s": "FX:USDJPY",
                                                    "d": "USD/JPY"
                                                },
                                                {
                                                    "s": "FX:USDCHF",
                                                    "d": "USD/CHF"
                                                },
                                                {
                                                    "s": "FX:AUDUSD",
                                                    "d": "AUD/USD"
                                                },
                                                {
                                                    "s": "FX:USDCAD",
                                                    "d": "USD/CAD"
                                                }
                                            ],
                                            "originalTitle": "Forex"
                                        }
                                    ]
                                }
                            </script>
                        </div>
                        <!-- TradingView Widget END -->
                    </div>
                    <div class="col-md-6 dashboardcenter" style="margin-bottom:2em;">










                                  @foreach ($groups as $group)
                                      @php
                                          $commentdatas = \App\Models\Groupcomment::where('group_id', $group->id)->paginate(2);
                                      @endphp

                                    <section class="mt-5 shadow-lg border-secondary p-4 rounded">
                                        <div  style="margin-top: 2rem; margin-bottom: 1rem">


                                            <div class="titlemodel"
                                                 style="display: none; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100vh; z-index: 999; align-items: center; justify-content: center;">
                                                <div style="background-color: #fff; border: 1px solid transparent ; border-radius: 5px; position: relative;
            width: 50%;"
                                                >
                                                    <h6 style="padding-left: 10px; top: 10px;">Create a post</h6>
                                                    <a class="hidetitle"
                                                       style="position: absolute; top: 0px; right: 0px; color: #000; font-size: 45px; cursor: pointer; padding: 15px;">&times;</a>
                                                    <hr>
                                                    <form action="{{ route('edit.blog') }}" method="POST" enctype="multipart/form-data">
                                                        @csrf

                                                        <input type="hidden" name="id" value="{{ $group->id  }}">
                                                        @auth
                                                            <div class="main">
                                                                @if(\Illuminate\Support\Facades\Auth::user()->image)
                                                                    <img style="border-radius: 50px" src="{{ asset('storage/profileimage/' . \Illuminate\Support\Facades\Auth::user()->image) }}" alt="error">
                                                                @else
                                                                    <img style="border-radius: 50px" src="{{asset('profile.jpg')}}" alt="error">

                                                                @endif
                                                                <div>
                                                                    <h4 style="padding-left: 10px;">{{ \Illuminate\Support\Facades\Auth::user()->name  }}</h4>
                                                                    <div class="custom-select">
                                                                        <select name="visibility">
                                                                            <option {{ ($group->status == 1) ? 'selected' : '' }} value="1">
                                                                                Public
                                                                            </option>
                                                                            <option {{ ($group->status == 0) ? 'selected' : '' }} value="0">
                                                                                Private
                                                                            </option>
                                                                        </select>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endauth


                                                        <div class="custom-textarea">
                                    <textarea name="name"
                                              placeholder="Share what's on your mind ">{{ $group->group_name  }}</textarea>
                                                        </div>
                                                        <hr>
                                                        <div style="
        align-items: center;
        display: flex;
        justify-content: space-between;">
                                                            <div class="attachment-container">
                                                                <!-- Style the label to look like a button -->
                                                                <label for="attachment-type-input-{{ $group->id }}" class="attachment-icon">
                                                                    <i class="fas fa-paperclip icon"></i> <!-- Font Awesome paperclip icon -->
                                                                </label>
                                                                <input name="image" type="file" id="attachment-type-input-{{ $group->id }}"
                                                                       style="display: none;">
                                                            </div>

                                                            <div>
                                                                <button id="submitPostButton" type="submit" style="background-color: #4CAF50;

                                    border: none;
                                    color: white;
                                    padding: 10px;
                                    margin-bottom: 10px;
                                    margin-right: 10px;
                                    text-align: center;
                                    text-decoration: none;
                                    display: inline-block;
                                    font-size: 16px;
                                    cursor: pointer;
                                    border-radius: 8px;">
                                                                    Post
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </form>

                                                </div>
                                            </div>


                                        </div>

                                        <div class="comment-form">

                                            <!-- Comment Form -->


                                            <form method="POST" action="{{ route('blog.comment') }}">

                                             <div class="mb-4 d-flex ">
                                                 <img  style="width: 70px"  src="{{ asset('posts/' . $group->category->image) }}" class="rounded-circle"   >
                                                 <h5 class="m-4 text-capitalize">{{$group->category->name}}</h5>

                                             </div>
                                                <div style="display: flex">

                                                    @if ($group->image)
                                                        <div style="flex:0.8;">
                                                            <img src="{{ asset('blogphotos/' . $group->image) }}"
                                                                 style="height: auto; max-height: 350px; width: 100%; border-radius: 10px;"
                                                                 alt="error">
                                                        </div>
                                                    @endif
                                                    <div class="row" style="flex:1;">
                                                        <div class=" col-md-11">
                                                            <h6 style="background-color: white; padding: 1rem">{{ $group->group_name }}</h6>
                                                        </div>

                                                    </div>


                                                </div>

      @auth
    @if($group->status == 1)
        <div class="group-title mt-5">
            <p style="font-size: 13.5px;" class="">Post A Comment</p>
        </div>
        @csrf
        <div class="row clearfix">
            <input type="hidden" name="group_id" value="{{ $group->id }}">
            
            <div class="col-lg-12 col-md-12 col-sm-12 form-group" style="height: 7vh">
                <textarea class="rounded" style="height: 7vh" name="comment" required placeholder="Your Comment here..."></textarea>
            </div>

            <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                <button class="btn-style-one theme-btn" style="padding: 0.5rem; border-radius: 5px" type="submit">
                    Post
                </button>
            </div>
        </div>
    @else
        <div class="group-title mt-5" style="display: none;">
            <p style="font-size: 13.5px;" class="">Post A Comment</p>
        </div>
        
    @endif
@endauth
</form>

                        <style>
                        .avatar {
                            position: relative;
                            display: inline-block;
                            width: 3rem;
                            height: 3rem;
                            font-size: 1.25rem;
                        }

                        .avatar-img,
                        .avatar-initials,
                        .avatar-placeholder {
                            width: 100%;
                            height: 100%;
                            border-radius: inherit;
                        }

                        .avatar-img {
                            display: block;
                            -o-object-fit: cover;
                            object-fit: cover;
                        }

                        .avatar-initials {
                            position: absolute;
                            top: 0;
                            left: 0;
                            display: -ms-flexbox;
                            display: flex;
                            -ms-flex-align: center;
                            align-items: center;
                            -ms-flex-pack: center;
                            justify-content: center;
                            color: #fff;
                            line-height: 0;
                            background-color: #a0aec0;
                        }

                        .avatar-placeholder {
                            position: absolute;
                            top: 0;
                            left: 0;
                            background: #a0aec0 url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 20 20'%3e%3cpath fill='%23fff' d='M10 9a3 3 0 100-6 3 3 0 000 6zm-7 9a7 7 0 1114 0H3z'/%3e%3c/svg%3e") no-repeat center/1.75rem;
                        }

                        .avatar-indicator {
                            position: absolute;
                            right: 0;
                            bottom: 0;
                            width: 20%;
                            height: 20%;
                            display: block;
                            background-color: #a0aec0;
                            border-radius: 50%;
                        }

                        .avatar-group {
                            display: -ms-inline-flexbox;
                            display: inline-flex;
                        }

                        .avatar-group .avatar+.avatar {
                            margin-left: -0.75rem;
                        }

                        .avatar-group .avatar:hover {
                            z-index: 1;
                        }

                        .avatar-sm,
                        .avatar-group-sm>.avatar {
                            width: 2.125rem;
                            height: 2.125rem;
                            font-size: 1rem;
                        }

                        .avatar-sm .avatar-placeholder,
                        .avatar-group-sm>.avatar .avatar-placeholder {
                            background-size: 1.25rem;
                        }

                        .avatar-group-sm>.avatar+.avatar {
                            margin-left: -0.53125rem;
                        }

                        .avatar-lg,
                        .avatar-group-lg>.avatar {
                            width: 4rem;
                            height: 4rem;
                            font-size: 1.5rem;
                        }

                        .avatar-lg .avatar-placeholder,
                        .avatar-group-lg>.avatar .avatar-placeholder {
                            background-size: 2.25rem;
                        }

                        .avatar-group-lg>.avatar+.avatar {
                            margin-left: -1rem;
                        }

                        .avatar-light .avatar-indicator {
                            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
                        }

                        .avatar-group-light>.avatar {
                            box-shadow: 0 0 0 2px rgba(255, 255, 255, 0.75);
                        }

                        .avatar-dark .avatar-indicator {
                            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.25);
                        }

                        .avatar-group-dark>.avatar {
                            box-shadow: 0 0 0 2px rgba(0, 0, 0, 0.25);
                        }

                        / Font not working in <textarea>for this version of bs / textarea {
                            font-family: inherit;
                        }
                        </style>

                                            <div>
                                                <div style="margin: 2% 7%;">
                                                    <div class="col-lg-8">
                                                    @if ($commentdatas->count() > 0)
                                                        <h5>{{$commentdatas->count()}} <span style="margin-left:1%">Comments</span></h5>
                                                    @endif    
                                                    </div>
                                                </div>
                                                @if ($commentdatas->count() > 0)
                                                    <div style="background-color: #FFFFFF; color: black; padding: 0; " >
                                                        @foreach ($commentdatas as $commentdata)
                                                        @php
                                                            $commentreplies = DB::table('group_comment_replies')->where('comment_id',
                                                            $commentdata->id)->get();
                                                        @endphp
                                                            <div class="row">
                                                                <div class="col-12 shadow rounded pt-4">
                                                                    <div class="flex-shrink-0" style="display: flex;align-items: center;">
                                                                        @if($commentdata->user_image != null)
                                                                            <div class="avatar avatar-sm rounded-circle">
                                                                                <img class="avatar-img" src="{{ asset($commentdata->user_image) }}">
                                                                            </div>
                                                                        @else
                                                                            <div class="avatar avatar-sm rounded-circle">
                                                                                <img class="avatar-img" src="{{asset('profile.jpg')}}">
                                                                            </div>
                                                                        @endif
                                                                        <h5 class="font-bold" style="margin-left: 1rem">
                                                                            {{ $commentdata->user_name }}
                                                                        </h5>
                                                                    </div>
                                                                    <div style="margin-left: 3rem; margin-bottom: 1rem;font-size:1.2rem">
                                                                        {{ $commentdata->comment }}</div>
                                                                    <div style="margin-left:12%">
                                                                        @if($commentreplies->count() > 0)
                                                                        <div class="comment-replies bg-light p-3 mt-3 rounded">
                                                                            <h6 class="comment-replies-title mb-4 text-muted text-uppercase">
                                                                                {{$commentreplies->count()}} replies</h6>    
                                                                            @foreach($commentreplies as $commentreplie)
                                                                            <div class="reply d-flex mb-4">
                                                                                @if($commentdata->user_image != null)
                                                                                    <div class="flex-shrink-0">
                                                                                        <div class="avatar avatar-sm rounded-circle">
                                                                                            <img class="avatar-img"
                                                                                                src="{{ asset($commentreplie->user_image) }}"
                                                                                                >
                                                                                        </div>
                                                                                    </div>
                                                                                @else 
                                                                                    <div class="flex-shrink-0">
                                                                                        <div class="avatar avatar-sm rounded-circle">
                                                                                            <img class="avatar-img"
                                                                                                src="{{asset('profile.jpg')}}"
                                                                                                >
                                                                                        </div>
                                                                                    </div>
                                                                                @endif
                                                                                <div class="flex-grow-1 ms-2 ms-sm-3">
                                                                                    <div class="reply-meta d-flex align-items-baseline">
                                                                                        <h6 class="mb-0 me-2"> {{$commentreplie->user_name}}</h6>
                                                                                    </div>
                                                                                    <div class="reply-body">
                                                                                        {{$commentreplie->reply}}
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                            @endforeach
                                                                        </div>
                                                                        @endif
                                                                    </div>
                                                                    <div style="display:flex;aign-item:center;justify-content:end;padding:2%;">
                                                                        <button class="btn btn-success replyToComment">reply</button>
                                                                    </div>
                                                                </div>


                                                                @auth

                                                                    <div class="col-1">
                                                                        <li class="dropdown">

                                                                            @if ($commentdata->user_id == Auth::user()->id)
                                                                                <style>
                                                                                    .dropdown {
                                                                                        position: relative;
                                                                                        display: inline-block;
                                                                                    }

                                                                                    .dropbtn {
                                                                                        background-color: transparent;
                                                                                        color: #000;
                                                                                        font-size: 32px;
                                                                                        border: none;
                                                                                        cursor: pointer;
                                                                                    }

                                                                                    .dropdown-content {
                                                                                        display: none;
                                                                                        position: absolute;
                                                                                        background-color: #f9f9f9;
                                                                                        min-width: 140px;
                                                                                        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
                                                                                        z-index: 1;
                                                                                    }

                                                                                    .dropdown-content a {
                                                                                        color: black;
                                                                                        padding: 12px 16px;
                                                                                        text-decoration: none;
                                                                                        display: block;
                                                                                    }

                                                                                    .dropdown-content a:hover {background-color: #f1f1f1;}

                                                                                    .dropdown:hover .dropdown-content {display: block;}

                                                                                    .dropdown:hover .dropbtn {background-color: #f9f9f9;}

                                                                                </style>

                                                                                <div class="dropdown">
                                                                                    <button class="dropbtn">&#8285;</button>
                                                                                    <div class="dropdown-content">
                                                                                        <a href="#" class="editcomment">Edit</a>
                                                                                        <a href="{{ route('comment.delete', $commentdata->id) }}"
                                                                                        >Delete</a>

                                                                                    </div>
                                                                                </div>



                                                                        @endif
                                                                    </div>
                                                            </div>
                                                            @endauth

                                                            <div class="comentmodel"
                                                                 style="display: none; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 999; align-items: center; justify-content: center;">
                                                                <div
                                                                    style="background-color: #fff; padding: 20px; border-radius: 10px; position: relative;">
                                                                    <a class="hidecomment"
                                                                       style="position: absolute; top: 10px; right: 10px; color: #000; font-size: 30px; cursor: pointer;">&times;</a>
                                                                    <form method="POST" action="{{ route('update.comment') }}">

                                                                        <div class="group-title">
                                                                            <h5 class="comment-heading">Update Comment</h5>
                                                                        </div>
                                                                        @csrf
                                                                        <div class="row clearfix">
                                                                            <input type="hidden" name="id"
                                                                                   value="{{ $commentdata->id }}">
                                                                            <div class="col-lg-12 col-md-12 col-sm-12 form-group"
                                                                                 style="height: 7vh">
                                                            <textarea style="height: 8vh" name="comment" required
                                                                      placeholder="Your Comment here..."> {{ $commentdata->comment }}</textarea>
                                                                            </div>

                                                                            <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                                                                <button class="btn-style-one theme-btn"
                                                                                        style="padding: 0.5rem; border-radius: 5px"
                                                                                        type="submit">
                                                                                    Update
                                                                                </button>
                                                                            </div>

                                                                        </div>
                                                                    </form>
                                                                </div>
                                                            </div>
                                                            <div class="replyToCommentModel"
                                    style="display: none; background-color: rgba(0, 0, 0, 0.5); position: fixed; top: 0; left: 0; width: 100%; height: 100%; z-index: 999; align-items: center; justify-content: center;">
                                    <div
                                        style="background-color: #fff; padding: 20px; border-radius: 10px; position: relative; width: 50%;">
                                        <a class="hidereplyComment"
                                            style="position: absolute; top: 10px; right: 10px; color: #000; font-size: 30px; cursor: pointer;">&times;</a>
                                        <form method="POST" action="{{ route('comment.reply') }}">

                                            <div class="group-title">
                                                <h5 class="comment-heading">Reply</h5>
                                            </div>
                                            @csrf
                                            <div class="row clearfix">
                                                <input type="hidden" name="id" value="{{ $commentdata->id }}">
                                                <div class="col-lg-12 col-md-12 col-sm-12 form-group"
                                                    style="height: 7vh">
                                                    <textarea style="height: 8vh" name="reply" required
                                                        placeholder="Your reply here..."></textarea>
                                                </div>

                                                <div class="col-lg-4 col-md-4 col-sm-12 form-group">
                                                    <button class="btn-style-one theme-btn"
                                                        style="padding: 0.5rem; border-radius: 5px" type="submit">
                                                        submit
                                                    </button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                                                            <hr
                                                                style="background-color: black; height: 2px; border: none; margin: 20px 0; font-size: 2rem;">
                                                        @endforeach
                                                    </div>
                                                @endif
                                                {{ $commentdatas->links()  }}
                                            </div>
                                        </div>
                                    </section>
                                  @endforeach
                    </div>

                    <div class="col-md-3 dashboardright">



                        <!-- Bottom Right  -->
                        <div class="tabsection">
                            <!-- TradingView Widget BEGIN -->
                            <!-- TradingView Widget BEGIN -->
                            <div class="tradingview-widget-container">
                                <div class="tradingview-widget-container__widget"></div>
                                <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                                                                             rel="noopener nofollow"
                                                                             target="_blank"><span
                                            class="blue-text"></span></a></div>
                                <script type="text/javascript"
                                        src="https://s3.tradingview.com/external-embedding/embed-widget-hotlists.js"
                                        async>
                                    {
                                        "colorTheme"
                                    :
                                        "dark",
                                            "dateRange"
                                    :
                                        "12M",
                                            "exchange"
                                    :
                                        "US",
                                            "showChart"
                                    :
                                        true,
                                            "locale"
                                    :
                                        "en",
                                            "largeChartUrl"
                                    :
                                        "",
                                            "isTransparent"
                                    :
                                        false,
                                            "showSymbolLogo"
                                    :
                                        false,
                                            "showFloatingTooltip"
                                    :
                                        false,
                                            "width"
                                    :
                                        "100%",
                                            "height"
                                    :
                                        "660",
                                            "plotLineColorGrowing"
                                    :
                                        "rgba(41, 98, 255, 1)",
                                            "plotLineColorFalling"
                                    :
                                        "rgba(41, 98, 255, 1)",
                                            "gridLineColor"
                                    :
                                        "rgba(240, 243, 250, 0)",
                                            "scaleFontColor"
                                    :
                                        "rgba(106, 109, 120, 1)",
                                            "belowLineFillColorGrowing"
                                    :
                                        "rgba(41, 98, 255, 0.12)",
                                            "belowLineFillColorFalling"
                                    :
                                        "rgba(41, 98, 255, 0.12)",
                                            "belowLineFillColorGrowingBottom"
                                    :
                                        "rgba(0, 0, 0, 0)",
                                            "belowLineFillColorFallingBottom"
                                    :
                                        "rgba(41, 98, 255, 0)",
                                            "symbolActiveColor"
                                    :
                                        "rgba(41, 98, 255, 0.12)"
                                    }
                                </script>
                            </div>
                            <!-- TradingView Widget END -->
                            <!-- TradingView Widget END -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </div>
        </div>
        </div>
    @else
        <div class="else">
            You Must Login First
        </div>
    @endauth
    <script>
        $(document).ready(function () {
            // Function to filter the followstock rows based on input value
            function filterStocks() {
                var inputVal = $("#company-name-input").val().toUpperCase();
                $(".followstocks .followstockleft h4").each(function () {
                    var stockName = $(this).text().toUpperCase();
                    var row = $(this).closest(".followstockleft").parent();
                    if (stockName.indexOf(inputVal) > -1) {
                        row.show();
                    } else {
                        row.hide();
                    }
                });
            }

            $(".search-button").on("click", function () {
                filterStocks();
            });
            $("#company-name-input").on("keyup", function () {
                filterStocks();
            });
        });
    </script>

    <script>
        $(document).ready(function () {
            // Function to filter the followstock rows based on input value
            function filterWishlist(wishlistName) {
                var uppercaseWishlistName = wishlistName.toUpperCase();
                $(".followstocks .followstockleft h4").each(function () {
                    var stockName = $(this).text().toUpperCase();
                    var row = $(this).closest(".followstockleft").parent();
                    if (stockName.indexOf(uppercaseWishlistName) > -1) {
                        row.show();
                        var onClickFunction = row.find('button').attr('onclick');
                        // console.log("onclick attribute value:", onClickFunction);
                        row.find('button[onclick="' + onClickFunction + '"]').click();
                    } else {
                        row.hide();
                    }
                });
            }

            $(".wishlist-button").on("click", function () {
                var wishlistName = $(this).data("wishlist");
                filterWishlist(wishlistName);
            });
        });
    </script>
     <script>
        $(document).ready(function(){
            $('#categorySelect').change(function(){
                var selectedRoute = $(this).val();
                if(selectedRoute !== '') {
                    window.location.href = selectedRoute;
                }
            });
        });
    </script>


    <script>
        var imageUrl = "{{ asset('assets/images/user.png') }}";
    </script>

    <script>
    function fevremove(){
        alert('Do you really want to delete it?');
    }
    </script>



    <script>
        document.addEventListener("click", function(event) {
            var dropdowns = document.getElementsByClassName("dropdown-content");
            var i;
            for (i = 0; i < dropdowns.length; i++) {
                var openDropdown = dropdowns[i];
                if (openDropdown.classList.contains('show')) {
                    openDropdown.classList.remove('show');
                }
            }
        });

    </script>
    <script>
        document.addEventListener('DOMContentLoaded', function () {

            // Event listeners for showing and hiding the modal for each comment
            var editButtons = document.querySelectorAll('.editcomment');
            var hideButtons = document.querySelectorAll('.hidecomment');
            var commentModels = document.querySelectorAll('.comentmodel');

            editButtons.forEach(function (button, index) {
                button.addEventListener('click', function () {
                    commentModels[index].style.display = 'flex';

                });
            });

            hideButtons.forEach(function (button, index) {
                button.addEventListener('click', function () {
                    commentModels[index].style.display = 'none';
                });
            });
        });


    </script>
<script>
document.addEventListener("DOMContentLoaded", function(event) {
    var scrollpos = localStorage.getItem('scrollpos');
    if (scrollpos) window.scrollTo(0, scrollpos);
});

window.onbeforeunload = function(e) {
    localStorage.setItem('scrollpos', window.scrollY);
};
</script>
<script>
document.addEventListener('DOMContentLoaded', function() {

    // Event listeners for showing and hiding the modal for each comment
    var editButtons = document.querySelectorAll('.replyToComment');
    var hideButtons = document.querySelectorAll('.hidereplyComment');
    var commentModels = document.querySelectorAll('.replyToCommentModel');

    editButtons.forEach(function(button, index) {
        button.addEventListener('click', function() {
            commentModels[index].style.display = 'flex';

        });
    });

    hideButtons.forEach(function(button, index) {
        button.addEventListener('click', function() {
            commentModels[index].style.display = 'none';
        });
    });
});
</script>
<script>
setTimeout(function() {
    document.getElementById('flash-message').style.display = 'none';
}, 3000);
</script>
@endsection