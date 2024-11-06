$(document).ready(function(){ 
    var selectedCountry = (selectedRegion = selectedCity = "");
                // This is a demo API key for testing purposes. You should rather request your API key (free) from http://battuta.medunes.net/
                var BATTUTA_KEY = "00000000000000000000000000000000";
                // Populate country select box from battuta API
                url =
                  "https://battuta.medunes.net/api/country/all/?key=" +
                  BATTUTA_KEY +
                  "&callback=?";

                // EXTRACT JSON DATA.
                $.getJSON(url, function(data) {
                  console.log(data);
                  $.each(data, function(index, value) {
                    // APPEND OR INSERT DATA TO SELECT ELEMENT.
                    $("#country12").append(
                      '<option value="' + value.code + '">' + value.name + "</option>"
                    );
                  });
                });
                //Country selected --> update region list .
                $("#country12").change(function() {
                  selectedCountry = this.options[this.selectedIndex].text;
                  countryCode = $("#region").val();
                  //countryCode = 'in';
                  //Populate country select box from battuta API
                  url =
                    "https://battuta.medunes.net/api/region/" +
                    countryCode +
                    "/all/?key=" +
                    BATTUTA_KEY +
                    "&callback=?";
                    console.log(url);
                  $.getJSON(url, function(data) {
                    $("#region option12").remove();
                    $('#region12').append('<option value="">Please select your region</option>');

                    $("#city option12").remove();
                    $('#city142').append('<option value="">Please select your city</option>');
                    $.each(data, function(index, value) 
                    {
                      // APPEND OR INSERT DATA TO SELECT ELEMENT.
                      $("#region1212").append('<option value="' + value.state + '">' + value.state + "</option>");
                    });
                  });
                });
                // Region selected --> updated city list
                $("#region122").on("change", function() 
                {
                  selectedRegion = this.options[this.selectedIndex].text;
                 // console.log(selectedRegion);
                  // Populate country select box from battuta API
                  countryCode = $("#country1212").val();
                  region = $("#region121").val();
                  url =
                    "https://battuta.medunes.net/api/city/" +
                    countryCode +
                    "/search/?region=" +
                    region +
                    "&key=" +
                    BATTUTA_KEY +
                    "&callback=?";
                  $.getJSON(url, function(data) {
                    console.log(data);
                    $("#city option1212").remove();
                    $('#city1212').append('<option value="">Please select your city</option>');
                    $.each(data, function(index, value) {
                      // APPEND OR INSERT DATA TO SELECT ELEMENT.
                      $("#city1212").append(
                        '<option value="' + value.city + '">' + value.city + "</option>"
                      );
                    });
                  });
                });
                // city selected --> update location string
                $("#city121212").on("change", function() {
                  selectedCity = this.options[this.selectedIndex].text;
                  $("#location12122").html(
                    "Location: Country: " +
                      selectedCountry +
                      ", Region: " +
                      selectedRegion +
                      ", City: " +
                      selectedCity
                  );
                });

                var selectedCountry = (selectedRegion = selectedCity = "");
                // This is a demo API key for testing purposes. You should rather request your API key (free) from http://battuta.medunes.net/
                var BATTUTA_KEY = "00000000000000000000000000000000";
                // Populate country select box from battuta API
                url =
                  "https://battuta.medunes.net/api/country/all/?key=" +
                  BATTUTA_KEY +
                  "&callback=?";

                // EXTRACT JSON DATA.
                $.getJSON(url, function(data) {
                  console.log(data);
                  $.each(data, function(index, value) {
                    // APPEND OR INSERT DATA TO SELECT ELEMENT.
                    $("#country11212").append(
                      '<option value="' + value.code + '">' + value.name + "</option>"
                    );
                  });
                });
                //Country selected --> update region list .
                $("#country112122").change(function() {
                  selectedCountry = this.options[this.selectedIndex].text;
                  countryCode = $("#country").val();
                  //Populate country select box from battuta API
                  url =
                    "https://battuta.medunes.net/api/region/" +
                    countryCode +
                    "/all/?key=" +
                    BATTUTA_KEY +
                    "&callback=?";
                  $.getJSON(url, function(data) {
                    $("#region option").remove();
                    $('#region1').append('<option value="">Please select your region</option>');
                    $.each(data, function(index, value) 
                    {
                      // APPEND OR INSERT DATA TO SELECT ELEMENT.
                      $("#region11212").append('<option value="' + value.region + '">' + value.region + "</option>");
                    });
                  });
                });
                // Region selected --> updated city list
                $("#region112122").on("change", function() 
                {
                  selectedRegion = this.options[this.selectedIndex].text;
                  // Populate country select box from battuta API
                  countryCode = $("#country1").val();
                  region = $("#region1").val();
                  url =
                    "https://battuta.medunes.net/api/city/" +
                    countryCode +
                    "/search/?region=" +
                    region +
                    "&key=" +
                    BATTUTA_KEY +
                    "&callback=?";
                  $.getJSON(url, function(data) {
                    console.log(data);
                    $("#city option").remove();
                    $('#city1').append('<option value="">Please select your city</option>');
                    $.each(data, function(index, value) {
                      // APPEND OR INSERT DATA TO SELECT ELEMENT.
                      $("#city1").append(
                        '<option value="' + value.city + '">' + value.city + "</option>"
                      );
                    });
                  });
                });
                // city selected --> update location string
                $("#city1").on("change", function() {
                  selectedCity = this.options[this.selectedIndex].text;
                  $("#location").html(
                    "Location: Country: " +
                      selectedCountry +
                      ", Region: " +
                      selectedRegion +
                      ", City: " +
                      selectedCity
                  );
                });
});

$(document).ready( function () {
    $('#myTable').DataTable();
} );



                  
           