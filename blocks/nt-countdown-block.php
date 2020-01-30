<?php
/**
 * Block Name: NTnext - Countdown Block
 *
 * This is the template that displays a basic horizontal countdown blocks - NTnext - Countdown Block.
 */

$id = 'ntnext_block-' . $block['id'];
$id_counter = 'counter-' . $block['id'];
?>

<section id="<?php echo $id; ?>" class="grid-container block__nt-countdown  full" style="background-color:<?php echo get_field('background_color'); ?>">
    <div class="<?php if ( get_field('size') ) : ?> <?php echo get_field('size'); ?> <?php endif; ?>">        
        <div class="row">
            <?php if ( get_field('set_countdown_title') ) : ?>
                <h2 class="countdown_title">
                    <?php echo get_field('set_countdown_title'); ?>
                </h2>
            <?php endif; ?>
        <span class="countdown" id="<?php echo $id_counter ?>">
            <?php echo get_field('set_date_countdown'); ?>
        </span>
    </div>
</section>

<script>
var countdowndate_acf ="<?php echo get_field('set_date_countdown'); ?>";
var counterdiv_id ="<?php echo $id_counter ?>";
// Set the date we're counting down to
var countDownDate = new Date(countdowndate_acf).getTime();

// Update the count down every 1 second
var x = setInterval(function() {

  // Get today's date and time
  var now = new Date().getTime();

  // Find the distance between now and the count down date
  var distance = countDownDate - now;

  // Time calculations for days, hours, minutes and seconds
  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
  var seconds = Math.floor((distance % (1000 * 60)) / 1000);

  // Display the result in the element with id="demo"
  document.getElementById(counterdiv_id).innerHTML = "<span class='days single_count'>"+days + "<span class='label'>DAYS</span></span> <span class='hours single_count'>" + hours + "<span class='label'>HOURS</span></span><span class='minue single_count'>"
  + minutes + "<span class='label'>MINUTES</span></span> <span class='seconds single_count'>" + seconds + "<span class='label'>SECONDS</span></span>";

  // If the count down is finished, write some text
  if (distance < 0) {
    clearInterval(x);
    document.getElementById(counterdiv_id).innerHTML = "EXPIRED";
  }
}, 1000);

console.log(countdowndate_acf);
</script>
