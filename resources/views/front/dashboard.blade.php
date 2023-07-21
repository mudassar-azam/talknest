
@extends('layouts.front.main')
@section('content')
@auth
    <div class="container-fluid">
        <div class="" style="width:94%; margin:0 auto;" >
            <div class="row" style="margin:0 auto;">


                <div class="col-md-3 dashboardleft">
                    <h4 class="myportfolio">My Portfolios</h4>
                    <h4 class="myfavourite">My Favourite</h4>
                    <h4 class="blankborderdiv"></h4>

                    <h4 class="marketoverview">Market Overview</h4>
                    <!-- TradingView Widget BEGIN -->
                    <div class="tradingview-widget-container" >
                        <div class="tradingview-widget-container__widget"></div>
                        <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                                rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on
                                    TradingView</span></a></div>
                        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js"
                            async>
                            {
                                "colorTheme": "light",
                                "dateRange": "12M",
                                "showChart": true,
                                "locale": "en",
                                "largeChartUrl": "",
                                "isTransparent": false,
                                "showSymbolLogo": true,
                                "showFloatingTooltip": false,
                                "width": "100%",
                                "height": "660",
                                "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                                "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                                "gridLineColor": "rgba(240, 243, 250, 0)",
                                "scaleFontColor": "rgba(106, 109, 120, 1)",
                                "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                                "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                                "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                                "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                                "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                                "tabs": [{
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
                <div class="col-md-6 dashboardcenter">
                    <h4 class="myupdate">My Updates</h4>
                    <h4 class="myfavouritecenter">My Favourite</h4>

                    <div class="followstocks">
                        <h4>Follow your favorite stocks</h4>

                        <div class="row my-3 border-top border-bottom py-3">
                            <div class="col-8 followstockleft">
                                <h4>TSLA</h4>
                                <h6>Tesla</h6>
                            </div>
                            <div class="col-4 followstockright">
                                <button><i class="fa-regular fa-star"></i> Add to watchlist</button>
                            </div>
                        </div>





                        <div class="row my-3 border-top border-bottom py-3">
                            <div class="col-8 followstockleft">
                                <h4>MSFT</h4>
                                <h6>Microsoft</h6>
                            </div>
                            <div class="col-4 followstockright">
                                <button><i class="fa-regular fa-star"></i> Add to watchlist</button>
                            </div>
                        </div>


                        <div class="row my-3 border-top border-bottom py-3">
                            <div class="col-8 followstockleft">
                                <h4>BRK.A</h4>
                                <h6>Berkshire Hathaway</h6>
                            </div>
                            <div class="col-4 followstockright">
                                <button><i class="fa-regular fa-star"></i> Add to watchlist</button>
                            </div>
                        </div>



                        <div class="row my-3 border-top border-bottom py-3">
                            <div class="col-8 followstockleft">
                                <h4>VTI</h4>
                                <h6>Vanguard Index Funds - Vanguard Total Stock Market ETF</h6>
                            </div>
                            <div class="col-4 followstockright">
                                <button><i class="fa-regular fa-star"></i> Add to watchlist</button>
                            </div>
                        </div>



                        <div class="row my-3 border-top border-bottom py-3">
                            <div class="col-8 followstockleft">
                                <h4>GOOGL</h4>
                                <h6>Alphabet</h6>
                            </div>
                            <div class="col-4 followstockright">
                                <button><i class="fa-regular fa-star"></i> Add to watchlist</button>
                            </div>
                        </div>



                        <div class="row my-3 border-top border-bottom py-3">
                            <div class="col-8 followstockleft">
                                <h4>AAPL</h4>
                                <h6>Apple</h6>
                            </div>
                            <div class="col-4 followstockright">
                                <button><i class="fa-regular fa-star"></i> Add to watchlist</button>
                            </div>
                        </div>



                        <div class="row my-3 border-top border-bottom py-3">
                            <div class="col-8 followstockleft">
                                <h4>AMZN</h4>
                                <h6>Amazon.com</h6>
                            </div>
                            <div class="col-4 followstockright">
                                <button><i class="fa-regular fa-star"></i> Add to watchlist</button>
                            </div>
                        </div>



                        <div class="row my-3 border-top border-bottom py-3">
                            <div class="col-8 followstockleft">
                                <h4>VOO</h4>
                                <h6>Vanguard Index Funds - Vanguard S&P 500 ETF</h6>
                            </div>
                            <div class="col-4 followstockright">
                                <button><i class="fa-regular fa-star"></i> Add to watchlist</button>
                            </div>
                        </div>













                    </div>
                </div>
                <div class="col-md-3 dashboardright">
                    <h4 class="myupdate">Market Performance</h4>

                    <div class="row marketperformancerow">
                        <input type="text" placeholder="company name" />
                        <button class="btn btn-primary">Search</button>
                    </div>



                    <div class="py-4">
                        <canvas id="myChart" style="width:100%;max-width:700px">
                    </div>


                    <div class="tabsection">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                                    rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on
                                        TradingView</span></a></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js"
                                async>
                                {
                                    "colorTheme": "light",
                                    "dateRange": "12M",
                                    "showChart": true,
                                    "locale": "en",
                                    "largeChartUrl": "",
                                    "isTransparent": false,
                                    "showSymbolLogo": true,
                                    "showFloatingTooltip": false,
                                    "width": "100%",
                                    "height": "660",
                                    "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                                    "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                                    "gridLineColor": "rgba(240, 243, 250, 0)",
                                    "scaleFontColor": "rgba(106, 109, 120, 1)",
                                    "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                                    "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                                    "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                                    "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                                    "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                                    "tabs": [{
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





                    <!-- Bottom Right  -->



                    <div class="tabsection">
                        <!-- TradingView Widget BEGIN -->
                        <div class="tradingview-widget-container">
                            <div class="tradingview-widget-container__widget"></div>
                            <div class="tradingview-widget-copyright"><a href="https://www.tradingview.com/"
                                    rel="noopener nofollow" target="_blank"><span class="blue-text">Track all markets on
                                        TradingView</span></a></div>
                            <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-market-overview.js"
                                async>
                                {
                                    "colorTheme": "light",
                                    "dateRange": "12M",
                                    "showChart": true,
                                    "locale": "en",
                                    "largeChartUrl": "",
                                    "isTransparent": false,
                                    "showSymbolLogo": true,
                                    "showFloatingTooltip": false,
                                    "width": "100%",
                                    "height": "660",
                                    "plotLineColorGrowing": "rgba(41, 98, 255, 1)",
                                    "plotLineColorFalling": "rgba(41, 98, 255, 1)",
                                    "gridLineColor": "rgba(240, 243, 250, 0)",
                                    "scaleFontColor": "rgba(106, 109, 120, 1)",
                                    "belowLineFillColorGrowing": "rgba(41, 98, 255, 0.12)",
                                    "belowLineFillColorFalling": "rgba(41, 98, 255, 0.12)",
                                    "belowLineFillColorGrowingBottom": "rgba(41, 98, 255, 0)",
                                    "belowLineFillColorFallingBottom": "rgba(41, 98, 255, 0)",
                                    "symbolActiveColor": "rgba(41, 98, 255, 0.12)",
                                    "tabs": [{
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
@endsection
