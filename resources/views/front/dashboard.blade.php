@extends('layouts.front.main')
@section('content')


<div class="container-fluid">
    <div class="container">
        <div class="row">


            <div class="col-md-3 dashboardleft">
                <h4 class="myportfolio">My Portfolios</h4>
                <h4 class="myfavourite">My Favourite</h4>
                <h4 class="blankborderdiv"></h4>

                <h4 class="marketoverview">Market Overview</h4>

                <div class="tabsection">
                    <div class="dashboardtabshead">
                        <ul>
                            <li class="active">
                                <a>Indices</a>
                            </li>

                            <li>
                                <a>Futures</a>
                            </li>


                            <li>
                                <a>Bonds</a>
                            </li>


                            <li>
                                <a>Forex</a>
                            </li>
                        </ul>
                    </div>


                    <div class="dashboardlists">
                        <ul>
                            <li>
                                <div class="row border-bottom pb-2 ">
                                    <div class="col-6">
                                        <h4>SPXUSD *</h4>
                                        <h6>S&P 500</h6>
                                    </div>
                                    <div class="col-6 d-flex flex-column align-items-center">
                                        <h4>4146.3</h4>
                                        <h6 class="text-success">S&P 500</h6>
                                    </div>
                                </div>
                            </li>


                            <li>
                                <div class="row border-bottom pb-2 ">
                                    <div class="col-6">
                                        <h4>AZXUSD *</h4>
                                        <h6>L&P 200</h6>
                                    </div>
                                    <div class="col-6 d-flex flex-column align-items-center">
                                        <h4>3136.3</h4>
                                        <h6 class="text-success">L&P 200</h6>
                                    </div>
                                </div>
                            </li>



                            <li>
                                <div class="row border-bottom pb-2 ">
                                    <div class="col-6">
                                        <h4>MJXUSD *</h4>
                                        <h6>A&L 100</h6>
                                    </div>
                                    <div class="col-6 d-flex flex-column align-items-center">
                                        <h4>2346.3</h4>
                                        <h6 class="text-success">A&L 100</h6>
                                    </div>
                                </div>
                            </li>



                            <li>
                                <div class="row border-bottom pb-2 ">
                                    <div class="col-6">
                                        <h4>RPXUSD *</h4>
                                        <h6>W&P 900</h6>
                                    </div>
                                    <div class="col-6 d-flex flex-column align-items-center">
                                        <h4>1246.3</h4>
                                        <h6 class="text-success">W&P 900</h6>
                                    </div>
                                </div>
                            </li>



                            <li>
                                <div class="row border-bottom pb-2 ">
                                    <div class="col-6">
                                        <h4>
                                            OPIUSD *</h4>
                                        <h6>K&M 600</h6>
                                    </div>
                                    <div class="col-6 d-flex flex-column align-items-center">
                                        <h4>0126.3</h4>
                                        <h6 class="text-success">K&M 600</h6>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                </div>
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
            </div>



        </div>
    </div>
</div>



@endsection