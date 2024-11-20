$(document).ready(function(){

      $('#chckinCard').change(function(){

        if($(this).is(':checked'))

        {

          $("#clocktower").show();

        }

        else

        {

          $("#clocktower").hide();

        }

      });



      $("#recentLogin").change(function(){

        if($(this).is(':checked'))

        {

          $("#recentblk").show();

        }

        else

        {

          $("#recentblk").hide();

        }

      });



      $("#empblock1").change(function(){

        if($(this).is(':checked'))

        {

          $("#box1").show();

          $("#box2").hide();

          $("#box3").hide();

          $("#box4").hide();

        }

        else

        {

          $("#box1").hide();



        }

        });

     

      $("#empblock3").change(function(){

        if($(this).is(':checked'))

        {

          $("#box3").show();

          $("#box2").hide();

          $("#box1").hide();

          $("#box4").hide();

        }

        else

        {

          $("#box2").hide();



        }

        });

      $("#empblock4").change(function(){

        if($(this).is(':checked'))

        {

          $("#box4").show();

          $("#box2").hide();

          $("#box3").hide();

          $("#box1").hide();

        }

        else

        {

          $("#box4").hide();



        }

        });



      $("#attendblock1").change(function(){

        if($(this).is(':checked'))

        {

          $("#attend1").show();

          $("#attend2").hide();

          $("#attend3").hide();

          $("#attend4").hide();

        }

        else

        {

          $("#attend1").hide();



        }

        });

      $("#attendblock2").change(function(){

        if($(this).is(':checked'))

        {

          $("#attend2").show();

          $("#attend1").hide();

          $("#attend3").hide();

          $("#attend4").hide();

        }

        else

        {

          $("#attend2").hide();



        }

        });

      

      $("#attendblock4").change(function(){

        if($(this).is(':checked'))

        {

          $("#attend4").show();

          $("#attend2").hide();

          $("#attend3").hide();

          $("#attend1").hide();

        }

        else

        {

          $("#attend4").hide();



        }

        });

        

         $("#salaryblock1").change(function(){

        if($(this).is(':checked'))

        {

          $("#salary1").show();

          $("#salary2").hide();

          $("#salary3").hide();

        }

        else

        {

          $("#salary1").hide();



        }

        });

      $("#salaryblock2").change(function(){

        if($(this).is(':checked'))

        {

          $("#salary2").show();

          $("#salary1").hide();

          $("#salary3").hide();

        }

        else

        {

          $("#salary2").hide();



        }

        });

      

      $("#salaryblock3").change(function(){

        if($(this).is(':checked'))

        {

          $("#salary3").show();

          $("#salary2").hide();

          $("#salary1").hide();

        }

        else

        {

          $("#salary3").hide();



        }

        });



       $("#leaveblock1").change(function(){

        if($(this).is(':checked'))

        {

          $("#leave1").show();

          $("#leave2").hide();

          $("#leave3").hide();

        }

        else

        {

          $("#leave1").hide();



        }

        });

      $("#leaveblock2").change(function(){

        if($(this).is(':checked'))

        {

          $("#leave2").show();

          $("#leave1").hide();

          $("#leave3").hide();

        }

        else

        {

          $("#leave2").hide();



        }

        });

      

      $("#leaveblock3").change(function(){

        if($(this).is(':checked'))

        {

          $("#leave3").show();

          $("#leave2").hide();

          $("#leave1").hide();

        }

        else

        {

          $("#leave3").hide();



        }

        });



      $("#reportblock1").change(function(){

        if($(this).is(':checked'))

        {

          $("#todayreport1").show();

          $("#todayreport2").hide();
          $("#todayreport3").hide();

        }

        else

        {

          $("#todayreport1").hide();



        }

        });

      

      $("#reportblock2").change(function(){

        if($(this).is(':checked'))

        {

          $("#todayreport2").show();

          $("#todayreport1").hide();
          $("#todayreport3").hide();

        }

        else

        {

          $("#todayreport2").hide();



        }

        });

      $("#reportblock3").change(function(){

        if($(this).is(':checked'))
        {

          $("#todayreport3").show();

          $("#todayreport1").hide();
          $("#todayreport2").hide();

        }

        else
        {

          $("#todayreport3").hide();



        }

        });





      $("#empHolidays").change(function(){

        if($(this).is(':checked'))

        {

          $("#anualholi").show();

          

        }

        else

        {

          $("#anualholi").hide();



        }

        });



      $("#upcomingEvents").change(function(){

        if($(this).is(':checked'))

        {

          $("#cupevents").show();

          

        }

        else

        {

          $("#cupevents").hide();



        }

        });



      $("#teamTasks").change(function(){

        if($(this).is(':checked'))

        {

          $("#teampage").show();

          

        }

        else

        {

          $("#teampage").hide();



        }

        });

      

    });







  $(document).ready(function(){

      var donutChartCanvas = $('#donutChart').get(0).getContext('2d')

        var donutData        = {

          labels: [

              'Today Present',

              'Today Absent',

              'Today Leave',

              

          ],

          datasets: [

            {

              data: [4,4,4],

              backgroundColor : ['#00a65a', '#f56954', '#f39c12',],

            }

          ]

        }

        var donutOptions     = {

          maintainAspectRatio : false,

          responsive : true,

        }

        //Create pie or douhnut chart

        // You can switch between pie and douhnut using the method below.

        new Chart(donutChartCanvas, {

          type: 'doughnut',

          data: donutData,

          options: donutOptions

        });



        

          $("#clickScreen").click(function(){

            $("#screenDown").fadeToggle("slow");

          });

          

        

  });



   $(document).ready(function(){

      var donutChartCanvas = $('#donutChart1').get(0).getContext('2d')

        var donutData        = {

          labels: [

              'Month Present',

              'Month Absent',

              'Month Leave',

              

          ],

          datasets: [

            {

              data: [24,6,0],

              backgroundColor : ['#00a65a', '#f56954', '#f39c12',],

            }

          ]

        }

        var donutOptions     = {

          maintainAspectRatio : false,

          responsive : true,

        }

        //Create pie or douhnut chart

        // You can switch between pie and douhnut using the method below.

        new Chart(donutChartCanvas, {

          type: 'doughnut',

          data: donutData,

          options: donutOptions

        });



        

          $("#clickScreen").click(function(){

            $("#screenDown").fadeToggle("slow");

          });

          

        

  });

