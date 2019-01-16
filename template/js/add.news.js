
    $('input.knob').on('click', function(event) {
        event.preventDefault();
        var activityValue = $('input.activity').val();
        var categoryValue = $('select.category').val();
        var headlineValue = $('input.headline').val();
        var contentsValue = $('textarea.contents--column').val();
        var dateValue     = $('input.date').val();
        var newsId        = $('input.newsId').val();
        var newsId        = $('input.newsId').val();
        if (!($('input.activity').is(':checked'))) {
          activityValue = 'N';
        } 

       
        $.ajax({
          method: "POST",
          dataType:"JSON",
          url: "../components/add_news.php",
          data: { 
                  activism: activityValue, 
                  categories: categoryValue,
                  caption: headlineValue,
                  description: contentsValue,
                  date: dateValue,
                  id: newsId
                }
        })
          .done(function( data ) {
            if (data.active == 'true') {
              $('div.message-positive').append('<div class="alert alert-success" role="alert">'+data.mes+'</div>');   
            }
          });

    })
