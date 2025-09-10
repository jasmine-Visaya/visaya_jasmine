<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="<?=base_url();?>public/style.css">
  <title>UsersData</title>
  <style>
    /* Reset some defaults */
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      background: #f4f6f9;
      color: #333;
    }

    h1 {
      margin-top: 10px;
      text-align: center;
      padding: 20px;
      margin: 0;
      background: #188b5cff;
      color: white;
      font-size: 28px;
    }

    table {
      width: 80%;
      margin: 30px auto;
      border-collapse: collapse;
      box-shadow: 0 2px 8px rgba(0,0,0,0.1);
      background: #fff;
      border-radius: 10px;
      overflow: hidden;
    }

    th, td {
      padding: 12px 15px;
      text-align: center;
    }

    th {
      background-color: #188b5cff;
      color: white;
      font-size: 16px;
    }

    tr:nth-child(even) {
      background-color: #f9f9f9;
    }

    tr:hover {
      color: white;
      background-color: #1b5244de;
      transition: 0.3s;
    }

    td {
      font-size: 14px;
    }
  </style>
</head>
<body>
  <h1>Welcome to UsersData View</h1>
  <table>
    <tr>
      <th>ID</th>
      <th>Username</th>
      <th>Email</th>
      <th>Actions</th>
    </tr>
    <?php foreach (html_escape($users) as $user): ?>
    <tr>
      <td><?=$user['id'];?></td>
      <td><?=$user['username'];?></td>
      <td><?=$user['email'];?></td>
      
      <td><a href="<?=site_url('users/update/'.$user['id']);?>" class="link-update">Update </a> | <a href="<?=site_url('users/delete/'.$user['id']);?>" class="link-delete">Delete</a></td>
    </tr>
    <?php endforeach; ?>
  </table>
  <a  href="<?=site_url('users/create');?>" class="btn-create">Create Record</a>
</body>
</html>
