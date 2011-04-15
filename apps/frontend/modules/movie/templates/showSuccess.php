<?php use_stylesheet('movie_show') ?>

<h1><?php echo $movie->getTitle() ?></h1>

<div id="movie-info">
  
    <div id="movie-meta">
      <?php if ($movie->getImageLink()): ?>
        <?php echo image_tag($movie->getImageLink(), array('alt' => 'Image not found.')) ?>
      <?php else: ?>
        <?php include_partial('noImage', array('movie' => $movie)) ?>
      <?php endif ?>
      <dl>
        <dt>Director</dt><dd><?php echo $movie->getDirector()->getName() ?></dd>
        <dt>Year</dt><dd><?php echo $movie->getYear() ?></dd>
        <dt>Genre</dt><dd><?php echo $movie->getGenre()->getName() ?></dd>
      </dl>
    </div>
  </div>
  <div id="movie-synopsis">
    <p>
      <?php echo $movie->getSynopsis() ?>
    </p>  
  </div>



<div id="trailer">
  <iframe title="YouTube video player" width="480" height="390" src="http://www.youtube.com/embed/<?php echo $movie->getTrailerLink() ?>" frameborder="0" allowfullscreen></iframe>
</div>
