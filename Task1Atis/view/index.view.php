<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Task 1 ATIS</title>
    <?php require 'need.html'?>
</head>

<body class='card-body' style="background-repeat: no-repeat;background-size: cover; background-image: url('https://visme.co/blog/wp-content/uploads/2017/07/50-Beautiful-and-Minimalist-Presentation-Backgrounds-011.jpg')">

    <span>
        <div style="float:right;margin-top:4%">
            <input type="text" name="search" id="myInput" placeholder='Search...' class="form-control" <?php if (isset($_GET['search'])) {echo "value=" . $_GET['search']; } ?>>
        </div>
        <h1 class='h1' style="font-family: 'Fascinate', cursive;
font-family: 'Libre Barcode 128 Text', cursive;">Check In</h1>

    </span>
    <div>

        <br>
        <div>
            <select id="srt" class="form-control">
                <option value="checked" <?php if (isset($select)) {
                                            if ($search == 'checked')
                                                echo "selected";
                                        } ?>>Sort By</option>
                <option value="name" <?php if (isset($select)) {
                                            if ($select == 'name')
                                                echo "selected";
                                        } ?>>Name ↓</option>
                <option value="name desc" <?php if (isset($select)) {
                                                if ($select == 'name desc')
                                                    echo "selected";
                                            } ?>>Name ↑</option>
                <option value="surname" <?php if (isset($select)) {
                                            if ($select == 'surname')
                                                echo "selected";
                                        } ?>>Surname ↓</option>

                <option value="surname desc" <?php if (isset($select)) {
                                                    if ($select == 'surname desc')
                                                        echo "selected";
                                            } ?>>Surname ↑</option>

            </select>
        </div>
    </div>
    <div id=''>
        <h1>
            <php echo $page_no?>
        </h1>


        <div id='tbs'>

            <table class='table table-light table-striped' id='data' border=1>
                <thead class='thead-dark'>
                    <tr class='head'>
                        <th scope='col'>Name </td>
                        <th scope='col'>Surname </td>
                        <th scope='col'>Check in button </td>
                    </tr>
                </thead>
                <tbody id='tb'>
                    <?php foreach ($result as $guest) : ?>

                        <tr scope='row'>

                            <?php if ($guest->checked == false) : ?>
                                <td><?php echo ucfirst($guest->name); ?></td>
                                <td><?php echo ucfirst($guest->surname); ?></td>
                                <td style='text-align:center'><button class='a btn btn-primary btn-sm  ' id=<?php echo $guest->id ?>>CHECK IN</button></td>
                            <?php endif; ?>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
            <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                <strong>Page <?php echo $page_no . " of " . $total_no_of_pages; ?></strong>
                <ul class="pagination ">
                    
                    <?php
                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++) {
                            if ($counter == $page_no) {
                                echo "<li><button class='page btn btn-outline-error btn-sm' id='$counter'>$counter</button></li>";
                            } else
                                echo "<li><button class='page btn btn-outline-error btn-sm' id='$counter'>$counter</button></li>";
                        }
                    ?>
                    <li>
                        <button class='previous page btn btn-secondary' id='1'>Previous</button>
                    </li>

                    <li>
                        <button class='next page btn btn-secondary' id='2'>Next</button>
                    </li>

                    <?php if ($page_no < $total_no_of_pages) {
                        echo "<li><button class='last page btn btn-primary ' id='$total_no_of_pages'>Last &rsaquo;&rsaquo;</button></li>";
                    } ?>
                </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript" src="../view/js/jq.js"></script>
</body>

</html>