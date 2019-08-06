(function($) {
  "use strict"; // Start of use strict


  $("#completeFormForOneMangaByUrl").click(function() {
    var urlOfTheGame = $("input[name='link']").val();
    
    if(urlOfTheGame == '' || urlOfTheGame == undefined || urlOfTheGame == null) alert("Le lien n'est pas définis.");
    else if(!is_valid_url(urlOfTheGame)) alert("Le lien est incorrect");
    // url ok
    else
    {
      
      $("#runingCompletFormApi").show();
      var posting = $.post( "/index.php/api/getJsonFromNautiljonByUrl/" + TOKEN_API, { url: urlOfTheGame } );
     
      posting.done(function( data ) {
        $("#runingCompletFormApi").hide();
        var jsonData = null;
        try
        {
           jsonData = JSON.parse(data);
        }
        catch(e)
        {
           alert('Les données sont invalides !\r\n' + data);
           return;
        }

        // Json OK !
        completeFormWithData(jsonData);

      });
    }

  });

  function is_valid_url(url) {
      return /^(http(s)?:\/\/)?(www\.)?[a-z0-9]+([\-\.]{1}[a-z0-9]+)*\.[a-z]{2,5}(:[0-9]{1,5})?(\/.*)?$/.test(url);
  }

  function completeFormWithData(jsonData)
  {
    // Title
    if(jsonData.hasOwnProperty('title')) $("input[name='title']").val(jsonData.title);

    // Date
    if(jsonData.hasOwnProperty('date'))
    {
      if(jsonData.date != "9999-00-00")
      {
        var dateFormated = new Date(jsonData.date);
        // Jours
        var formatedDay = ('0' + dateFormated.getDate()).slice(-2);
        $("select[name='date-day']").val(formatedDay).change();

        // Mois
        var formatedMonth = ('0' + (dateFormated.getMonth()+1)).slice(-2);
        $("select[name='date-month']").val(formatedMonth).change();

        // Année
        $("input[name='date-year']").val(dateFormated.getFullYear());
      }
      else
      {
        $("select[name='date-day']").val('00').change();
        $("select[name='date-month']").val('00').change();
        $("input[name='date-year']").val('9999');
      }
    }

    // Status
    if(jsonData.hasOwnProperty('status')) $("select[name='status']").val(jsonData.status).change();

    // Published_tomes
    if(jsonData.hasOwnProperty('published_tomes')) $("input[name='publish']").val(jsonData.published_tomes);

    // Price
    if(jsonData.hasOwnProperty('price')) $("input[name='price']").val(jsonData.price);

    // Editor
    if(jsonData.hasOwnProperty('editor')) $("input[name='editor']").val(jsonData.editor);

    // Type
    if(jsonData.hasOwnProperty('type')) $("select[name='type']").val(jsonData.type).change();
  }

  window.phptimestampToDateForApiUpdate = function(timestamp)
  {
    var dateFromTimestamp = new Date(timestamp * 1000);

    var formatedDay = ('0' + dateFromTimestamp.getDate()).slice(-2);
    var formatedMonth = ('0' + (dateFromTimestamp.getMonth()+1)).slice(-2);
    var formatedYear = dateFromTimestamp.getFullYear();
    var formatedDate = formatedDay + "/" + formatedMonth + "/" + formatedYear;

    var formatedHours = ('0' + dateFromTimestamp.getHours()).slice(-2);
    var formatedMinuts = ('0' + dateFromTimestamp.getMinutes()).slice(-2);
    var formatedSeconds = ('0' + dateFromTimestamp.getSeconds()).slice(-2);
    var formatedTiming = formatedHours + "h " + formatedMinuts + "m " + formatedSeconds + "s";

    var fullTxtDate = "le <strong>" + formatedDate + "</strong> à <strong>" + formatedTiming + "</strong>";

    $("#time_last_api_updated").html(fullTxtDate);
  }

})(jQuery); // End of use strict