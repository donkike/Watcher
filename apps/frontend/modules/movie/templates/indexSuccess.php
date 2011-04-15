<?php use_stylesheet('movie_index') ?>

<h1>Watcher</h1>

<?php foreach($movies as $movie): ?>
  <div class="movie-index">
    <div class="movie-links">
      <?php echo link_to('Show', url_for("movie_show", $movie)) ?> | 
      <?php echo link_to("Edit", url_for("movie_edit", $movie)) ?>
    </div>    
    <h2><?php echo $movie->getTitle() ?></h2>    
    <div class="movie-info-short">
      <dl>
        <dt>Year</dt><dd><?php echo $movie->getYear() ?></dd>
        <dt>Director</dt><dd><?php echo $movie->getDirector()->getName() ?></dd>
        <dt>Genre</dt><dd><?php echo $movie->getGenre()->getName() ?></dd>
      </dl>
      <p>
        <?php echo substr($movie->getSynopsis(), 0, 200) ?>
        <?php if (strlen($movie->getSynopsis()) > 200): ?>
          <?php echo link_to('...', url_for('movie_show', $movie)) ?>
        <?php endif ?>
      </p>      
    </div>
    <?php if ($movie->getImageLink()): ?>
      <?php echo image_tag($movie->getImageLink()) ?>
    <?php else: ?>
      <?php include_partial('noImage', array('movie' => $movie)) ?>
    <?php endif ?>
  </div>
<?php endforeach ?>

<a href="<?php echo url_for('movie/new') ?>">New</a>
