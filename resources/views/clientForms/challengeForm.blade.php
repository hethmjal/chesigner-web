@extends('layouts.chesignerApp')

@section('content')

    <br>
    <br>
    <br>

    <body class="grey-bg">
        <section class="container cstm-contain">
            <div class="col-md-2"></div>
            <div class="card-wrapper col-sm-8">
                <div class="card form-card">
                    <h3 class="text-center">Challenge Form</h3>
                    <br>
                    <br>
                    <div class="card-body">
                        <form>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="challengeType">Challenge Type </label>
                                    <select name="challengeType" id="slctChallengeType" class="form-control">
                                        <option value="G-Challenge"> Public Challenge </option>
                                        <option value="F-Challenge"> Favorite Designers Challenge </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="publicChall"
                                            name="publicChallenge">
                                        <label for="public"> Show the challenge to the public </label>
                                        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                                        <input type="checkbox" class="form-check-input" id="publicComments"
                                            name="publicComments">
                                        <label for="comments"> Allow participation & comment from the public </label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-12">
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
                                <div class="text-center col-md-12">
                                    <hr>
                                    <h3>Number of Participants</h3>
                                </div>
                            </div>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label for="expertDesigner"> Expert Designer </label>
                                    <input type="number" id="expertDesigner" name="expertDesigner" class="form-control"
                                        min="1" max="5">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="professionalDesigner"> Professional Designer </label>
                                    <input type="number" id="professionalDesigner" name="professionalDesigner"
                                        class="form-control" min="1" max="5">
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="ordinaryDesigner"> Ordinary Designer </label>
                                    <input type="number" id="OrdinaryDesigner" name="OrdinaryDesigner" class="form-control"
                                        min="1" max="5">
                                </div>
                                <div class="form-group col-md-12">
                                    <hr>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <label for="startDate"> Start Date </label>
                                    <input type="date" id="startDate" name="startDate" class="form-control">
                                </div>
                                <div class="form-group col-md-6">
                                    <label for="endDate"> End Date </label>
                                    <input type="date" id="endDate" name="endDate" class="form-control">
                                    <br>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="form-row">
                                <div class="form-group col-md-12">
                                    <label for="challengeDetails"> Challenge Details</label>
                                    <textarea class="form-control" id="challengeDetails" rows="5"></textarea>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="slidecontainer">
                                        <label for="" class="rangeLeft"> Modern </label>
                                        <label for="" class="rangeRight"> Clasic </label>
                                        <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="slidecontainer">
                                        <label for="" class="rangeLeft"> Text</label>
                                        <label for="" class="rangeRight"> Symbolic</label>
                                        <input type="range" min="1" max="100" value="50" class="slider" id="myRange1">
                                        <p>value:<span id="demo"></span></p>
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="slidecontainer">
                                        <label for="" class="rangeLeft"> Formal</label>
                                        <label for="" class="rangeRight"> Unfromal</label>
                                        <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="slidecontainer">
                                        <label for="" class="rangeLeft"> Luxury</label>
                                        <label for="" class="rangeRight"> Economy </label>
                                        <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                    </div>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <div class="slidecontainer">
                                        <label for="" class="rangeLeft"> Free</label>
                                        <label for="" class="rangeRight"> Geometreic</label>
                                        <input type="range" min="1" max="100" value="50" class="slider" id="myRange">
                                    </div>
                                </div>
                                <div class="form-group col-md-6">
                                    <div class="slidecontainer">
                                        <label for="" class="rangeLeft"> one</label>
                                        <label for="" class="rangeRight"> one</label>
                                        <input type="range" min="1" max="100" value="0" class="slider" id="myRange">
                                    </div>
                                    <br>
                                    <br>
                                </div>
                            </div>
                            <b class="challCost1"> Challenge Cost</b>
                            <b class="challCost2"> 1500 SAR </b>
                            <table class="table invoiceTable">
                                <tbody>
                                    <tr>
                                        <th class="text-left"> Challenge Fee </th>
                                        <td class="text-right">250 SAR</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Winner Design Award</th>
                                        <td class="text-right">1250 SAR</td>
                                    </tr>
                                    <tr>
                                        <th class="text-left">Other Designs Award</th>
                                        <td class="text-right"> 50 SAR </td>
                                    </tr>
                                </tbody>
                            </table>
                            <div class="form-row">
                                <div class="form-group col-md-6">
                                    <a href="#" class="btn btn1 btn-block">
                                        Save for later
                                    </a>
                                </div>
                                <div class="form-group col-md-6">
                                    <a href="#" class="btn btn1 btn-block">
                                        Submit order
                                    </a>
                                </div>
                            </div>
                            <br>
                            <br>
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
    var slider = document.getElementById("myRange1");
    var output = document.getElementById("demo");
    output.innerHTML = slider.value; 

    // Update the current slider value (each time you drag the slider handle)
    slider.oninput = function() {
        output.innerHTML = this.value;
    }

</script>
