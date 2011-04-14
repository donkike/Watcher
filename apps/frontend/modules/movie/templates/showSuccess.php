<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $movie->getId() ?></td>
    </tr>
    <tr>
      <th>Title:</th>
      <td><?php echo $movie->getTitle() ?></td>
    </tr>
    <tr>
      <th>Director:</th>
      <td><?php echo $movie->getDirectorId() ?></td>
    </tr>
    <tr>
      <th>Year:</th>
      <td><?php echo $movie->getYear() ?></td>
    </tr>
    <tr>
      <th>Synopsis:</th>
      <td><?php echo $movie->getSynopsis() ?></td>
    </tr>
    <tr>
      <th>Image link:</th>
      <td><?php echo $movie->getImageLink() ?></td>
    </tr>
    <tr>
      <th>Trailer link:</th>
      <td><?php echo $movie->getTrailerLink() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $movie->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $movie->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('movie/edit?id='.$movie->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('movie/index') ?>">List</a>
