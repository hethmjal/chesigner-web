@extends('layouts.chesignerApp')

@section('content')

    <br>
    <br>
    <br>

    <body class="grey-bg">
        <section class="container cstm-contain">
            <div class="col-md-2"></div>
            <div class="card-wrapper col-sm-8">
                <div class="form-card">
                    <h3 class="text-center">Direct Order Form</h3>
                    <br>
                    <br>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group">
                                    <label for="designType"> Design Type</label>
                                    <select name="designType" id="slctDesignType" class="form-control">
                                        <option value="logo"> logo </option>
                                        <option value="brochures"> Brochures </option>
                                        <option value="productsDesing"> Products Desing </option>
                                        <option value="posters"> Posters </option>
                                        <option value="animiations"> Animiations Video </option>
                                        <option value="video"> Video Design </option>
                                        <option value="visualIdentity"> Visual Identity </option>
                                        <option value="interiorDesign"> Interior Design </option>
                                        <option value="architecturalPlan"> Architectural Plan </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="form-check">
                                        <label for="public"> Choose Designers </label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" class="form-check-input" id="publicChall"
                                            name="publicChallenge">
                                        <label for="public"> Select all </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                @for ($i = 0; $i < 6; $i++)
                                    <div class="col-md-4">
                                        <div class="card">
                                            <div class="card-header">
                                                <div style="100%; display:inline-flex">
                                                    <div style="wosth:40%">
                                                        <img src="{{ asset('/images/p1.png') }}" alt=""
                                                            style="width:50px; margin-right: 16px;">
                                                    </div>
                                                    <div class="text-right" style="wosth:60%">
                                                        <h5>Leena Alsafadi </h5>
                                                        <div class="d-flex justify-content-between text-center">
                                                            <div class="ratings2">
                                                                <i class="fa fa-star rating2-color"></i>
                                                                <i class="fa fa-star rating2-color"></i>
                                                                <i class="fa fa-star rating2-color"></i>
                                                                <i class="fa fa-star rating2-color"></i>
                                                                <i class="fa fa-star"></i>
                                                                <small> 3.5/5 </small>
                                                            </div>
                                                        </div>
                                                        <h5> <b> مصمم خبير </b></h5>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="card-body" style="    padding: 0 5px 5px 0p !important;">
                                                <div class="skills-show">
                                                    <p class="skill-box"> جرافيك ديزاين </p>
                                                    <p class="skill-box"> تصميم داخلي </p>
                                                    <p class="skill-box"> موشن جرافيك </p>
                                                </div>
                                            </div>
                                            <br>
                                        </div>
                                    </div>
                                @endfor
                                <br>
                                <div class="text-center">
                                    <button class="button1"> Show more </button>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="startDate"> Submission Date </label>
                                    <input type="date" id="startDate" name="startDate" class="form-control">
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="challengeDetails"> Challenge Details</label>
                                    <textarea class="form-control" id="challengeDetails" rows="5"></textarea>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="form-check">
                                        &nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" class="form-check-input" id="publicChall"
                                            name="publicChallenge">
                                        <label for="public"> Schedule a meeting with designers</label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="meetingTime"> Meeting Time </label>
                                    <input type="time" id="meetingTime" name="meetingTime" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="meetingPlatform"> Meeting Platform </label>
                                    <select name="meetingPlatform" id="meetingPlatform" class="form-control">
                                        <option value="goggleMeet"> Google Meet </option>
                                        <option value="zoom"> Zoom </option>
                                    </select>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-md-6">
                                    <a href="#" class="btn btn1 btn-block">
                                        Save for later
                                    </a>
                                </div>
                                <div class="col-md-6">
                                    <a href="#" class="btn btn1 btn-block">
                                        Submit order
                                    </a>
                                </div>
                            </div>
                    </div>
                    <br>
                    <br>
                    </form>

                </div>
            </div>
            </div>
            <div class="col-md-2"></div>
        </section>
    </body>


@endsection

<script>
    var slider = document.getElementById("myRange");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value; // Display the default slider value

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        output.innerHTML = this.value;
    }

</script>
