<?php include 'view/zippy_admin_header.php'; ?>
<div id="main_div">
    <main>
        <section>
        <h2>Add Vehicle</h2><br>
        <form action="index.php" method="post" id="add_vehicle_form">
            <input type="hidden" name="action" value="add_vehicle">

            <label>Type:</label>
            <select name="type_code">
                <?php foreach ($types as $type) : ?>
                    <option value="<?php echo $type['type_code']; ?>">
                        <?php echo $type['type']; ?>
                </option>
                <?php endforeach; ?>
            </select><br>

            <label>Class:</label>
            <select name="class_code">
                <?php foreach ($classes as $class) : ?>
                    <option value="<?php echo $class['class_code']; ?>">
                        <?php echo $class['class']; ?>
                </option>
                <?php endforeach; ?>
            </select><br>

            <label>Year:</label>
            <input type="text" name="year" max="4" required><br>

            <label>Make:</label>
            <input type="text" name="make" required><br>

            <label>Model:</label>
            <input type="text" name="model" required><br>

            <label>Price:</label>
            <input type="text" name="price" required><br>

            <label>&nbsp;</label>
            <input type="submit" value="Add Vehicle"><br>
        </form><br><hr>

        <p><a href="zippy_admin_index.php?action=list_vehicles">Back to Admin Vehicle List</a></p><br>
        <P><a href="zippy_admin_index.php?action=edit_types">View/Edit Vehicle Types</a></p><br>
        <p><a href="zippy_admin_index.php?action=edit_classes">View/Edit Vehicle Classes</a></p>
        </section>
    </main>
</div>
<?php include 'view/footer.php'; ?>