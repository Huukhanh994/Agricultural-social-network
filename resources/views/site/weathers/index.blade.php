@extends('site.app')

@section('content')
    <div class="container">
        <div class="row" id="app">
            <div class="col col-xl-9 order-xl-2 col-lg-12 order-lg-1 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Widget Preview</h6>
                    </div>
                    <div class="ui-block-content">
                        <!-- Form Weather -->
                        <form>
                            <div class="row">
                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <fieldset class="form-group label-floating is-select">
                                        <label class="control-label">Country and Timezone</label>
                                        <select class="selectpicker form-control">
                                            <option value="AL">United States (UTC-8)</option>
                                            <option value="2">Ontario (UTC−6)</option>
                                            <option value="WY">Alberta (UTC−6)</option>
                                        </select>
                                    </fieldset>
    
                                    <fieldset class="form-group label-floating is-select">
                                        <label class="control-label">Extended Forecast Days</label>
                                        <select class="selectpicker form-control">
                                            <option value="AL">Show Next 7 days</option>
                                            <option value="2">Show Next 10 days</option>
                                            <option value="WY">Show Next 14 days</option>
                                        </select>
                                    </fieldset>
    
                                    <a href="#" class="btn btn-secondary btn-md full-width">Restore all Attributes</a>
                                </div>
    
                                <div class="col col-lg-6 col-md-6 col-sm-12 col-12">
                                    <fieldset class="form-group label-floating is-select">
                                        <label class="control-label">Temperature Unit</label>
                                        <select class="selectpicker form-control">
                                            <option value="AL">F° (Farenheit)</option>
                                            <option value="2">C° (Celsius)</option>
                                        </select>
                                    </fieldset>
    
                                    <div class="switcher-block">
                                        <div class="h6 title">Show Extended Forecast on Widget</div>
                                        <div class="togglebutton blue">
                                            <label>
                                                <input type="checkbox" checked="">
                                            </label>
                                        </div>
                                    </div>
    
                                    <a href="#" class="btn btn-blue btn-md full-width">Save all Changes</a>
                                </div>
                            </div>
                        </form>
    
                        <!-- ... end Form Weather -->
                    </div>
                </div>
    
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Extended Forecast</h6>
                    </div>
    
    
                    <!-- Slider Weather -->
    
                    <div class="swiper-container pagination-bottom" data-slide="fade">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide swiper-slide-weather" data-swiper-parallax="-500">
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Tomorrow</div>
    
                                    <svg class="olymp-weather-sunny-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-sunny-icon">
                                        </use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">60°</div>
                                        <div class="max-min-temperature">
                                            <span>55°</span>
                                            <span class="high">69°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Monday 28</div>
                                    <svg class="olymp-weather-wind-icon-header icon">
                                        <use
                                            xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-wind-icon-header">
                                        </use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">58°</div>
                                        <div class="max-min-temperature">
                                            <span>52°</span>
                                            <span class="high">64°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Tuesday 29</div>
    
                                    <svg class="olymp-weather-cloudy-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-cloudy-icon">
                                        </use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">67°</div>
                                        <div class="max-min-temperature">
                                            <span>62°</span>
                                            <span class="high">77°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Wednesday 30</div>
                                    <svg class="olymp-weather-rain-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-rain-icon"></use>
                                    </svg>
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">70°</div>
                                        <div class="max-min-temperature">
                                            <span>65°</span>
                                            <span class="high">82°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Thursday 31</div>
                                    <svg class="olymp-weather-storm-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-storm-icon">
                                        </use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">73°</div>
                                        <div class="max-min-temperature">
                                            <span>68°</span>
                                            <span class="high">79°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Friday 1</div>
                                    <svg class="olymp-weather-snow-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-snow-icon"></use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">68°</div>
                                        <div class="max-min-temperature">
                                            <span>56°</span>
                                            <span class="high">69°</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-weather" data-swiper-parallax="-500">
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Tomorrow</div>
    
                                    <svg class="olymp-weather-sunny-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-sunny-icon">
                                        </use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">60°</div>
                                        <div class="max-min-temperature">
                                            <span>55°</span>
                                            <span class="high">69°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Monday 28</div>
                                    <svg class="olymp-weather-wind-icon-header icon">
                                        <use
                                            xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-wind-icon-header">
                                        </use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">58°</div>
                                        <div class="max-min-temperature">
                                            <span>52°</span>
                                            <span class="high">64°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Tuesday 29</div>
    
                                    <svg class="olymp-weather-cloudy-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-cloudy-icon">
                                        </use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">67°</div>
                                        <div class="max-min-temperature">
                                            <span>62°</span>
                                            <span class="high">77°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Wednesday 30</div>
                                    <svg class="olymp-weather-rain-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-rain-icon"></use>
                                    </svg>
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">70°</div>
                                        <div class="max-min-temperature">
                                            <span>65°</span>
                                            <span class="high">82°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Thursday 31</div>
                                    <svg class="olymp-weather-storm-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-storm-icon">
                                        </use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">73°</div>
                                        <div class="max-min-temperature">
                                            <span>68°</span>
                                            <span class="high">79°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Friday 1</div>
                                    <svg class="olymp-weather-snow-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-snow-icon"></use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">68°</div>
                                        <div class="max-min-temperature">
                                            <span>56°</span>
                                            <span class="high">69°</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide swiper-slide-weather" data-swiper-parallax="-500">
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Tomorrow</div>
    
                                    <svg class="olymp-weather-sunny-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-sunny-icon">
                                        </use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">60°</div>
                                        <div class="max-min-temperature">
                                            <span>55°</span>
                                            <span class="high">69°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Monday 28</div>
                                    <svg class="olymp-weather-wind-icon-header icon">
                                        <use
                                            xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-wind-icon-header">
                                        </use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">58°</div>
                                        <div class="max-min-temperature">
                                            <span>52°</span>
                                            <span class="high">64°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Tuesday 29</div>
    
                                    <svg class="olymp-weather-cloudy-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-cloudy-icon">
                                        </use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">67°</div>
                                        <div class="max-min-temperature">
                                            <span>62°</span>
                                            <span class="high">77°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Wednesday 30</div>
                                    <svg class="olymp-weather-rain-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-rain-icon"></use>
                                    </svg>
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">70°</div>
                                        <div class="max-min-temperature">
                                            <span>65°</span>
                                            <span class="high">82°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Thursday 31</div>
                                    <svg class="olymp-weather-storm-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-storm-icon">
                                        </use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">73°</div>
                                        <div class="max-min-temperature">
                                            <span>68°</span>
                                            <span class="high">79°</span>
                                        </div>
                                    </div>
                                </div>
                                <div class="day-wethear-item" data-mh="wethear-item">
                                    <div class="title">Friday 1</div>
                                    <svg class="olymp-weather-snow-icon icon">
                                        <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-snow-icon"></use>
                                    </svg>
    
                                    <div class="wethear-now">
                                        <div class="temperature-sensor">68°</div>
                                        <div class="max-min-temperature">
                                            <span>56°</span>
                                            <span class="high">69°</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    
                        <!-- If we need pagination -->
                        <div class="swiper-pagination pagination-blue"></div>
                    </div>
    
                    <!-- ... end Slider Weather -->
    
                </div>
            </div>
            <div class="col col-xl-3 order-xl-1 col-lg-12 order-lg-2 col-md-12 col-sm-12 col-12">
                <div class="ui-block">
                    <div class="ui-block-title">
                        <h6 class="title">Widget Preview</h6>
                    </div>
    
    
                    <!-- W-Weather -->
    
                    <div class="widget w-wethear">
                        <a href="#" class="more"><svg class="olymp-three-dots-icon">
                                <use xlink:href="svg-icons/sprites/icons.svg#olymp-three-dots-icon"></use>
                            </svg></a>
    
                        <div class="wethear-now inline-items">
                            <div class="temperature-sensor">64°</div>
                            <div class="max-min-temperature">
                                <span>58°</span>
                                <span>76°</span>
                            </div>
    
                            <svg class="olymp-weather-partly-sunny-icon">
                                <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-partly-sunny-icon"></use>
                            </svg>
                        </div>
    
                        <div class="wethear-now-description">
                            <div class="climate">Partly Sunny</div>
                            <span>Real Feel: <span>67°</span></span>
                            <span>Chance of Rain: <span>49%</span></span>
                        </div>
    
                        <ul class="weekly-forecast">
    
                            <li>
                                <div class="day">sun</div>
                                <svg class="olymp-weather-sunny-icon">
                                    <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-sunny-icon"></use>
                                </svg>
    
                                <div class="temperature-sensor-day">60°</div>
                            </li>
    
                            <li>
                                <div class="day">mon</div>
                                <svg class="olymp-weather-partly-sunny-icon">
                                    <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-partly-sunny-icon">
                                    </use>
                                </svg>
                                <div class="temperature-sensor-day">58°</div>
                            </li>
    
                            <li>
                                <div class="day">tue</div>
                                <svg class="olymp-weather-cloudy-icon">
                                    <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-cloudy-icon"></use>
                                </svg>
    
                                <div class="temperature-sensor-day">67°</div>
                            </li>
    
                            <li>
                                <div class="day">wed</div>
                                <svg class="olymp-weather-rain-icon">
                                    <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-rain-icon"></use>
                                </svg>
    
                                <div class="temperature-sensor-day">70°</div>
                            </li>
    
                            <li>
                                <div class="day">thu</div>
                                <svg class="olymp-weather-storm-icon">
                                    <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-storm-icon"></use>
                                </svg>
    
                                <div class="temperature-sensor-day">58°</div>
                            </li>
    
                            <li>
                                <div class="day">fri</div>
                                <svg class="olymp-weather-snow-icon">
                                    <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-snow-icon"></use>
                                </svg>
    
                                <div class="temperature-sensor-day">68°</div>
                            </li>
    
                            <li>
                                <div class="day">sat</div>
    
                                <svg class="olymp-weather-wind-icon-header">
                                    <use xlink:href="svg-icons/sprites/icons-weather.svg#olymp-weather-wind-icon-header">
                                    </use>
                                </svg>
    
                                <div class="temperature-sensor-day">65°</div>
                            </li>
    
                        </ul>
    
                        <div class="date-and-place">
                            <h5 class="date">Saturday, March 26th</h5>
                            <div class="place">San Francisco, CA</div>
                        </div>
    
                    </div>
    
                    <!-- W-Weather -->
                </div>
            </div>
        </div>
    </div>
@endsection