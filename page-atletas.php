<?php /* Template Name: Atletas */ ?>

<?php get_header(); ?>

<?php
$image = get_field('cover');
$cover2 = get_field('cover_2');
$sessoes = get_field('sessoes');
?>
<style>
  .page-template-page-atletas, .page-template-page-atletas-php header{
    background-image: url('<?php echo $image['url']; ?>')
  }
  @media screen and (max-width: 48.9em){
    .page-template-page-atletas, .page-template-page-atletas-php header{
      background-image: url('<?php echo $image['sizes']['medium']; ?>')
    }
  }
</style>
<header>


<!--   <video poster="https://s3-us-west-2.amazonaws.com/s.cdpn.io/4273/polina.jpg" id="bgvid" playsinline autoplay muted>
  <source src="http://thenewcode.com/assets/videos/polina.webm" type="video/webm">
  <source src="http://thenewcode.com/assets/videos/polina.mp4" type="video/mp4">
  </video> -->
</header>

<section class="tecnologia-h1" style="padding: 0 0 0 0">
  <h1><?php the_title() ?></h1>
</section>
<?php if( have_rows('sessoes') ):
  while ( have_rows('sessoes') ) : the_row();
   $foto = get_sub_field('foto_menor');
?>
 <section>
  <div>
    <img src="<?php echo $foto['url']; ?>" />
  </div>
  <article>
    <?php the_sub_field('texto'); ?>
  </article>
 </section>

<?php endwhile; endif;?>


<?php if( $cover2 ): ?>
<style>
.page-template-page-atletas, .page-template-page-atletas-php .cover2{
  background-image: url('<?php echo $cover2['url']; ?>');
  min-height: 70vh;
}
@media screen and (max-width: 48.9em){
  .page-template-page-atletas, .page-template-page-atletas-php header{
    background-image: url('<?php echo $cover2['sizes']['medium']; ?>')
  }
}
</style>
<section class="cover2"></section>
<?php endif;?>


<?php get_footer();?>