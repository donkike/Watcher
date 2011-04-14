<h1>Movies List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Title</th>
      <th>Director</th>
      <th>Year</th>
      <th>Synopsis</th>
      <th>Image link</th>
      <th>Trailer link</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($movies as $movie): ?>
    <tr>
      <td><a href="<?php echo url_for('movie/show?id='.$movie->getId()) ?>"><?php echo $movie->getId() ?></a></td>
      <td><?php echo $movie->getTitle() ?></td>
      <td><?php echo $movie->getDirectorId() ?></td>
      <td><?php echo $movie->getYear() ?></td>
      <td><?php echo $movie->getSynopsis() ?></td>
      <td><?php echo $movie->getImageLink() ?></td>
      <td><?php echo $movie->getTrailerLink() ?></td>
      <td><?php echo $movie->getCreatedAt() ?></td>
      <td><?php echo $movie->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('movie/new') ?>">New</a>
