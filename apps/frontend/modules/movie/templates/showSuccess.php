<?php use_stylesheet('movie_show') ?>

<h1><?php echo $movie->getTitle() ?></h1>
<div class= "user_nav"> 
   <?php echo link_to('Edit', url_for('movie_edit', $movie)) ?> |
   <?php echo link_to('Back to list', url_for('movie')) ?>
</div>

<div id="movie-info" data-movie="<?php echo $movie->getId() ?>">
  
  <div id="movie-meta">
    <?php if ($movie->getImageLink()): ?>
      <?php echo image_tag('/uploads/'.$movie->getImageLink(), array('alt' => 'Image not found.')) ?>
    <?php else: ?>
      <?php include_partial('noImage', array('movie' => $movie)) ?>
    <?php endif ?>
    <dl>
      <dt>Director</dt><dd><?php echo $movie->getDirector()->getName() ?></dd>
      <dt>Year</dt><dd><?php echo $movie->getYear() ?></dd>
      <dt>Genre</dt><dd><?php echo $movie->getGenre()->getName() ?></dd>
    </dl>
  </div>

  <div id="movie-synopsis">
    <p>
      <?php echo $movie->getSynopsis() ?>
    </p>  
  </div>
  
  <div id="rating">
    <?php include_partial('ratingOverall', array('rating' => $movie->getMovieRating(), 'caption' => true)) ?>
    <strong>Rate this movie!</strong>
  </div>

  <?php if ($movie->getTrailerLink()): ?>
    <div id="trailer">
      <iframe title="YouTube video player" width="480" height="390" src="http://www.youtube.com/embed/<?php echo $movie->getTrailerLink() ?>"       frameborder="0" allowfullscreen></iframe>
    </div>
  <?php else: ?>
    <?php include_partial('noTrailer', array('movie' => $movie)) ?>
  <?php endif ?>  
  
</div>

