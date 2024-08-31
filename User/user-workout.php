<?php
$host = "localhost";  
$user = "root";  
$password = '';  
$db_name = "Gym";  
  
$conn = mysqli_connect($host, $user, $password, $db_name);
if (mysqli_connect_errno()) {
  die("Failed to connect with MySQL: " . mysqli_connect_error());
}
?>


<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />

    <!-- Bootstrap CSS -->
    <link
      rel="stylesheet"
      href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css"
      integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N"
      crossorigin="anonymous"
    />

    <title>GYMSTER</title>
  </head>
  <style>
    .logo {
      width: 10%;
      height: auto;
      margin-right: 20%;
    }
    img {
      width: 100%;
      height: 100%;
    }
    .navbar {
      background-color: rgba(217, 217, 217);
    }
    .collapse.navbar-collapse.itemcolor ul li a {
      color: black;
      font-weight: 600;
      font-size: medium;
      /* word-spacing: 30%; */
      padding-top: 10px;
      /* float: left; */
    }
    .collapse.navbar-collapse.itemcolor ul li {
      margin-left: 20px;
      margin-right: 20px;
    }
    .collapse.navbar-collapse.itemcolor ul li a:hover {
      color: rgb(158, 153, 153);
    }
    .collapse.navbar-collapse.itemcolor ul .nav-item.active a {
      color: rgb(0, 0, 0);
      font-weight: 600;
      /* color: rgb(50, 44, 44); */
      /* background-color: aliceblue; */
      /* font-size: small; */
    }
    .content p,ol{
      margin-left: 40px;
    }
   
  </style>

  <body>
    <nav class="navbar navbar-expand-lg navbar-dark">
      <button
        class="navbar-toggler"
        type="button"
        data-toggle="collapse"
        data-target="#navbarSupportedContent"
        aria-controls="navbarSupportedContent"
        aria-expanded="false"
        aria-label="Toggle navigation"
      >
        <span class="navbar-toggler-icon"></span>
      </button>

      <div
        class="collapse navbar-collapse itemcolor"
        id="navbarSupportedContent"
      >
        <ul class="navbar-nav mr-auto">
          <div class="logo">
            <img src="GymLogo2.png" alt="logo" />
          </div>

          <li class="nav-item">
            <a class="nav-link" href="user-home.html"
              >HOME <span class="sr-only">(current)</span></a
            >
          </li>
          <li class="nav-item active">
            <a class="nav-link" href="user-workout.php">WORKOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user-package.php">PACKAGE</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user-about.html">ABOUT</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="user-contact.html">CONTACT US</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="user-logout.php">LOGOUT</a>
          </li>
        </ul>
      </div>
    </nav>

        
        <div class="text-center mt-4" style="font-size:50px;font-weight:600;text-decoration: underline; ">WORKOUT EXERCISES</div>


 <div class="mx-1 my-5">        <!--row justify-content-center -->
      
    
    <table class="table table-hover table-dark" style="font-size: smaller;">
         <thead> <!--  table-fit -->
          <tr>
              <th>CATEGORY</th>
              <th>EXERCISES</th>
      </tr>
          </thead>
           <!-- PHP CODE TO FETCH DATA FROM ROWS -->

          <tbody>

          

          <?php 
    
            $query = "SELECT * FROM Workout";

            if ($result = mysqli_query($conn,$query)) { 
                while ($row = mysqli_fetch_array($result, MYSQLI_ASSOC)) {
                   
                   
                    echo '<tr> 
                            <td>' . $row["category"] . '</td>
                            <td>' . $row["exercise1"] . '</td>
                            <td>' . $row["exercise2"] . '</td>
                            <td>' . $row["exercise3"] . '</td>
                            <td>' . $row["exercise4"] . '</td>
                            <td>' . $row["exercise5"] . '</td>
                            <td>' . $row["exercise6"] . '</td>
                            <td>' . $row["exercise7"] . '</td>
                            <td>' . $row["exercise8"] . '</td>
                            <td>' . $row["exercise9"] . '</td>
                            <td>' . $row["exercise10"] . '</td>

                          </tr>';

                          // NOTE: in URL dont give spaces
                    
              echo "<tr>";
              // echo "<td>" . $row["username"] . "</td>";
              
              
              }
                mysqli_free_result($result);
            } 

            ?>
        </tbody>
      </table>

      </div>
        
          <h2 class="mx-3">Workouts F.A.Q.</h2>
       <div class="content mx-3 mt-4" style="border: 2px solid black;">
        
        <h4>
        1. What is the best routine for the gym?</h4>
        <p>The best routine for the gym is one that is flexible with your schedule and you actually enjoy. These two factors will contribute greatly to your ability to be consistent with your workouts. Consistency with your workouts and progressing as you perform them is what will lead to results.</p>
        <p>That being said, there are plenty of great workout program styles one can do to build muscle, lose fat, or build strength. The body composition goals (building muscle and losing fat) will be accomplished through similar style workouts combined with differing nutritional principles, while those looking for strength gains may need to focus on programs that are centered on the idea of specificity.</p>
        <p>To sum that statement up, if you want to change your body composition, you’ll want to train with volume. If you want to build strength, you’ll want a program that is strength specific for the lifts you want to improve such as the bench press, squat and deadlift.</p>
        <h4>
        2. What body parts to work on what days?</h4>
        <p>The answer to this question would assume that the person asking is referring to body part splits. In this case, the way you split your days likely won’t matter too much, as long as you work every body part throughout the week.</p>
        <p>There may be some benefit into ensuring you don’t hit chest and shoulders or legs and back on consecutive days, but if you do, it probably won’t be that big of an issue depending on your overall strength levels.</p>
        <p>However, if you are looking to optimize your training by incorporating a higher training frequency (hitting each muscle group more often throughout the week), you may want to look into pairing certain muscle groups on certain workout days.</p>
        <p>The most popular pairings are full body workouts, upper/lower workouts, push/pull workouts and push/pull/legs workouts.</p>
        <p>Again, the actual days you put your workouts on likely won’t make that much of a difference to the overall outcome of your training so long as you are consistent with your workouts and implement progressive overload (increasing the weight used) over time.</p>
        <h4>
        3. What should a beginner do at the gym?</h4>
        <p>The best thing a beginner can do at the gym is seek out the help of a trained professional to assist them with learning the proper form of each exercise. Practicing the basics and establishing a solid foundation in terms of form will help a beginner lifter remain injury free throughout their life.</p>
        <p>If you are not in the position to hire a trained professional, you may want to proceed working out with some level of caution. The same recommendation of practicing the fundamentals still applies. Start off with light weight (the bar on barbell exercises) and record yourself performing exercises.</p>
        <p>With the exercise recordings, compare your form with examples of proper form. Evaluate how you are moving and progress from there by either working on your form, or after you’ve mastered your form, adding weight.</p>
        <h4>
        4. What is the best workout routine for beginners?</h4>
        <p>The best workout routine for true beginners is rather subjective to what the beginner is comfortable doing and their understanding of how to perform exercises.</p>
        <p>Their ultimate goal will also play a huge factor as well.</p>
        <p>Generally speaking though, beginners can start off performing anywhere between 2-4 workouts per week. These workouts can be either full body workouts or upper/lower workouts.</p>
        <p>The workouts should focus on learning ideal movement patterns of fundamental lifts such as horizontal presses, vertical presses, horizontal pulls, vertical pulls, squats, hip hinges, and loaded carries.</p>
        <p>There are several beginner workout routines on Muscle &amp; Strength that can give beginners a template to start off with.</p>
        <h4>
        5. What is the best workout schedule to build muscle?</h4>
        <p>The best workout schedule to build muscle is a workout schedule that you enjoy and can be consistent with.</p>
        <p>In addition to consistency, it would be beneficial to have a higher training frequency if the goal is to build lean muscle mass. You’ll want to hit each muscle group either directly or indirectly 2-3 times weekly to maximize muscle growth.</p>
        <p>Some great splits to look into would be full body workouts, upper/lower workouts, push/pull workouts and push/pull/legs workouts.</p>
        <h4>
        7. What are the 10 best exercises?</h4>
        <p>The best 10 exercises for someone might not be the best 10 exercise for another person. When selecting an exercise to use, it’s important to keep your own abilities and goals in mind. Some people might be able to perform an exercise with no pain at all, while that same exercise might cause another a lot of pain. If it hurts, don’t do it and find an alternative.</p>
        <p>That being said, there are certainly important movement patterns that everyone who is capable should try to train.</p>
        <p>The following exercises are my personal favorite 10 exercises that would be fantastic to include in your workouts. However, like I said, you may need to substitute these with a variation that is better suited for your individual body type, training experience, and needs.</p>
        <ol>
        <li>
        Trap Bar Deadlift</li>
        <li>
        Front Squat</li>
        <li>
        Barbell Glute Bridge</li>
        <li>
        Bulgarian Split Squat</li>
        <li>
        Military Press</li>
        <li>
        Pull Up</li>
        <li>
        Barbell Row</li>
        <li>
        Barbell Bench Press</li>
        <li>
        Farmers Walk</li>
        <li>
        Dip</li>
        </ol>
        <h4>
        7. How do I schedule my workout at the gym?</h4>
        <p>This all boils down to setting up and selecting workout programs that are both flexible and enjoyable. There is no perfect one way to set up training. It’s very subjective from person to person.</p>
        <p>If you only have 2 days where you’re able to make it to the gym, a full body workout makes sense. 3 days? Full body makes sense, push/pull/legs can work as well if that is what you enjoy. The more days you have available, the more split and scheduling options you’ll have.</p>
        <p>Start off by figuring out how many and what days you can make it to the gym regularly. Then, look to schedule your training on those days. Find a workout that doesn’t require any more than that total training frequency. Then, look for something where if you miss a training day, you’re able to make it up throughout the week or already train that muscle more than once per week.</p>
        <h4>
        8. Can you gain 10 pounds of muscle in a month?</h4>
        <p>You can gain 10 pounds in a month. You can’t gain 10 pounds of pure muscle in a month naturally.</p>
        <p>10 pounds in a month is likely during a lean bulking phase, especially for beginners. The muscle will grow fairly quickly, and if you’re coming off a fat loss phase, early weight gain will be from glycogen replenishing and being stored in the body.</p>
        <p>If your goal is to gain muscle, it’s better to take a slower approach. This will limit fat gain during your muscle building phases.</p>
        <h4>
        9. What is a good gym routine?</h4>
        <p>A good gym routine is one that you enjoy, works your muscles with the appropriate frequency and volume for your experience level, and that you can be consistent with.</p>
        <p>This can look very different from person to person.</p>
        <p>Exercise selection for a good gym routine will train fundamental movement patterns (push, pull, lunge, hip hinge, squat, and carry) in a way that you are comfortable performing them. There is a pain-free variation for nearly every body type who can healthily perform these movements.</p>
        <p>A good gym routine also focuses on progression. This means making the workouts more challenging in some way from week to week, or training phase to training phase as you get more advanced.</p>
        <h4>
        10. How much weight should a beginner lift?</h4>
        <p>The total amount of weight someone should use is going to be different from individual to individual, and also exercise to exercise for each individual. Depending on the program, it might vary from set to set of each exercise based on the rep scheme.</p>
        <p>The general recommendation would be to experiment. You want your sets to be hard and very near failure whenever it’s possible to train at such an intensity.</p>
        <p>For compound exercises (like the fundamental ones listed above), aim to finish each set feeling as though you could’ve performed 1-3 more reps if pushed to your limit.</p>
        <p>On insolation exercises (those where you train just one muscle such as a leg extension or lateral raise) you can push yourself closer to complete failure.</p>
        <h4>
        11. How much cardio should a beginner do?</h4>
        <p>Cardio recommendations will be highly dependent on your overall goal. For most, it may not be even necessary to perform additional cardio. Focusing on progressing the weight used in your workouts and getting stronger over time will have a more beneficial impact on your body composition than cardio will.</p>
        <p>For those looking to be generally healthy, light cardio might be beneficial. Bouts of walking will go a long way to aiding with body composition, recovery, and your ability to handle life stressors.</p>
        <p>For those looking to lose body fat, focus should be primarily on your diet. Once you plateau, you can then add in additional cardio as a means to increase your progress. Again, it might not even be necessary.</p>
        <p>Often times, people buy-in to cardio being necessary for body composition. However, it’s more important for general health purposes than anything else and can actually negatively impact your ability to make progress in the gym depending on the form of cardio you choose to do, the intensity you perform it at, and your ability to recover.</p>
        <h4>
        12. How can a beginner build muscle?</h4>
        <p>By being consistent with their training, focusing on hitting each muscle group at least 2 times a week with an appropriate volume and weight for their abilities, and by progressing the weight used from workout to workout whenever possible.</p>
        <p>Be consistent. Train hard. Progress the weight.</p>
        <p>It takes time and it takes effort, but the process itself is pretty simple.</p>
        <h4>
        13. How many days a week should I work out?</h4>
        <p>How many days per week do you have available to work out? That is the more important question to answer.</p>
        <p>Generally, to see progress 2-4 workouts are needed. 3-4 workouts per week is the sweet spot. You can train more frequently depending on your goals and experience level. However, at least 2 days of resistance training per week is needed to see muscle growth.</p>
        <p>With that being said, during your training days, it is beneficial to perform full body workouts (2-3 training days per week) or upper/lower workouts (4 days per week). This will allow you to train with an optimal frequency to build or maintain lean body mass.</p>
        <h4>
        14. What is a good 5 day workout routine?</h4>
        <p>A good 5 day workout routine would be an upper/lower workout or push/pull/legs workout performed in a rotating training day fashion. You could also do an upper/lower or push/pull split with a “weaknesses” day as your 5th training day in the week.</p>
        <p>I’d recommend avoiding the traditional body part split if optimizing your training is your goal. However, they can still be useful if you’re simply working out for pure enjoyment purposes.</p>
        <h4>
        15. What can I drink to build muscle fast?</h4>
        <p>Building muscle takes time and consistency. Nothing will get you there fast(er) than your body is naturally able to through optimized training, nutrition and lifestyle habits.</p>
        <p>There are certainly supplements than can help you with the nutrition portion of things.Protein shakes are beneficial if you have trouble meeting your daily protein requirements. Mass gainer shakes are beneficial is you have trouble meeting your daily calorie requirements. Creatine can help improve performance and can help you build muscle more efficiently if you struggle to get it through your diet as well. And, of course, water is the driver of all things.</p>
        <p>Focus on getting your diet, workouts, and lifestyle under control and supplement as needed. That is what will help you build muscle optimally.</p>
        <h4>
        16. Is it better to do a full body workout every day?</h4>
        <p>Certain advanced bodybuilders can benefit from full body workouts 6 times per week. However, it’s not a common practice.</p>
        <p>Performing full body workouts every day might not be harmful depending on how you structure your training and the intensity in which you train with from session to session.</p>
        <p>For most though, it would be recommended to perform full body workouts 3-4 times per week. This would be more optimal for the larger portion of recreational lifters.</p>
        <h4>
        17. How many days a week should I work out to build muscle?</h4>
        <p>A minimum of 2 days of full body training with progressive overload is needed to build muscle.</p>
        <p>3 full body days is better. And once you get into the 4 training days per week, you begin reaching optimal training frequency and volume for the vast majority of lifters.</p>
        <p>There’s no perfect split for everyone. But most will benefit from an upper/lower workout split 4 days per week. This is the general gold standard for building muscle for most.</p>
        <h4>
        18. Is it OK to lift weights every day?</h4>
        <p>Depending on what you’re doing and how you structure your training, it certainly can be.</p>
        <p>Weight lifting every single day for most is going to be completely unnecessary. Training with high intensity every day of the week will get you injured and burnt out pretty quickly.</p>
        <p>Find a good 3-5 day per week weight training program that is well thought out with an appropriate volume and split and stick to it. Instead of chasing workouts, chase progressions. Try to improve your lifts in some way. This is going to help you out a lot more in the long run.</p>
        <h4>
        19. Is exercising every day bad?</h4>
        <p>Not at all depending on how you go about things. Plenty of people do some form of exercise every day of the week. But, you will want to consider a couple things.</p>
        <p>First, you’ll want to stick to a resistance training plan if your goal is specific. You’ll want it to be the main focus of your training. Any other form of exercise centers around it. As mentioned, optimally for most recreational lifters will be 3-5 days per week.</p>
        <p>On the other days, you’ll want to ensure that whatever form of exercise you select doesn’t take away from your ability to recover or push yourself during your main weight training sessions. Good forms of exercise will be recreational sports, walking, yoga, etc.</p>
        <p>What you don’t want to do is combine your weight training programs with another activity that is also very high intensity. The two will be counterproductive to one another.</p>
        <h4>
        20. Is it bad to go to the gym every day?</h4>
        <p>It depends on what you are doing while you are at the gym. You have to give your body time to recover if you want to grow, so if you are training intensely every single day, then it’s not ideal.</p>
        <p>If you are going to the gym out of habit every day, but not weight lifting, it may be ok. If some of your sessions are split between cardio, mobility work, and weight training – then, it might truly be fine.</p>
        <p>All that being said, unless you’re a competitive athlete, it’s highly unnecessary to go to the gym every day. You might want to consider other hobbies that aren’t necessarily related just to round yourself out as a human being.</p>
        <p>Going to the gym every day as a recreational lifter can lead to some obsessive habits that aren’t healthy. Focus on 3-5 days and spend your valuable time pursuing other priorities in life.</p>
        <h4>
        21. What should I do on rest days?</h4>
        <p>Rest on your rest days. Eat in a way that is consistent with your goals and focus on recovering from your training sessions.</p>
        <p>You can also do something that is known as active recovery. Active recovery can be performed in a number of ways but is a light activity that gets your blood flowing, isn’t stressful, and helps you recover.</p>
        <p>Some examples of active recovery include recovery walks, yoga, and mobility work.</p>
        <h2 class="blue-stripe">
        Workout Selection Tips</h2>
        <p>Selecting the right workout routine is crucial for reaching your goals. People who don't choose the right plan are setting themselves up for failure. Here are our top 8 tips for selecting a workout.</p>
        <ol>
        <li>
        Select a workout routine that's designed for your experience level. Seems simple right? Many people who are just getting started lifting still choose workout plans that are designed for experienced lifters and pro bodybuilders. You will get much faster results from a plan that suits your experience. If you're just starting out, find a beginner workout.</li>
        <p></p>
        <li>
        Be clear about your goals. When we polled our readers and asked their main goal the highest response was “build muscle and lose fat". Unless you're a beginner or taking steroids, this is extremely hard to achieve. Think about your goal before selecting a workout routine. Do you want to build muscle or lose fat first? Do you want to improve your sports performance? Do you want to increase endurance? The clearer you are about your goal the easier it is going to be to find the right plan and the better your results will be.</li>
        <p></p>
        <li>
        Think about your lifestyle and select a workout that fits. Don't try and fit a 5-6 day workout routine into your already busy lifestyle. You'll skip days, not recover properly and ultimately fail. You would have been better off with a workout plan that only requires 3 days in the gym. Think about how much time you can realistically put in working out.</li>
        <p></p>
        <li>
        Choose a workout routine you know you'll be able to stick with for the full duration. Most workout plans are designed for a set period. 8-10 weeks for example. You're not going to get the best results if you only follow the routine for 4-5 weeks. This is something you should definitely look out for in periodization routines as the workload often increases as you progress through the workout.</li>
        <p></p>
        <li>
        Know your body type before selecting a workout plan. Most new lifters don't understand how body types affect results. For example, a 6'2" man with a thin build often gets totally different results from the same workout than a 5'5" heavy set man. It's important you understand your own body type and what workout to use to maximize results.</li>
        <p></p>
        <li>
        Have realistic expectations. You've seen the magazine covers and fitness models on social media. Don't expect these results in the first 3 months of training. If you set your expectations too high you're bound to lose motivation and give up. These people have often been working out for over 10 years and do this as a full time job. So set small goals for improving your physique and don't compare to others.</li>
        <p></p>
        <li>
        Pick a plan you can do with a workout partner. Motivation is key to long term results in all aspects of fitness. Training with a partner is awesome. Workouts are more fun and you can keep each other motivated. Choose a workout partner that is slightly better than you. Meaning, if your goal is fat loss, they're slightly leaner. If your goal is muscle building then they're slightly bigger and stronger. This will bring out your competitive spirit as you try and match them when you're training.</li>
        </ol>
        </div>
        

    <footer class="mx-2">
      <div class="row">
        <div class="col-md-6">
          <p>@2022 Gymster's Gym.in. All Rights Reserved.</p>
        </div>
        <!-- <div class="col-sm-2 col-xs-6"></div>
        <div class="col-sm-2 col-xs-6"></div> -->
        <div class="col-md-6" style="text-align: right;">
          <a href=""
            >Terms &amp; Conditions</a
          >
          |<a href=""> Privacy Policy</a>
        </div>
      </div>
    </footer>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script
      src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"
      integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj"
      crossorigin="anonymous"
    ></script>
    <script
      src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"
      integrity="sha384-Fy6S3B9q64WdZWQUiU+q4/2Lc9npb8tCaSX9FK7E8HnRr0Jz8D6OP9dO5Vg3Q9ct"
      crossorigin="anonymous"
    ></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js" integrity="sha384-+sLIOodYLS7CIrQpBjl+C7nPvqq+FbNUBDunl/OZv93DB7Ln/533i8e/mZXLi/P+" crossorigin="anonymous"></script>
    -->
  </body>
</html>
