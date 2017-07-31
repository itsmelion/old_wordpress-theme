<?php /* Template Name: Atletas */ ?>

<?php get_header(); ?>

<?php $image = get_field('cover'); ?>
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

<section>

  <article>
    <h2>Atleta</h2>
    <p>Texto</p>
  </article>

  <div>IMAGE</div>

</section>

<?php get_footer();?>