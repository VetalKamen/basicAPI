<?php
require_once dirname(__DIR__) . '/Controller/CatController.php';

$data_info = $cat_controller->listBreeds();

$content = $data_info['content'];

$breeds = \json_decode($content);
?>

<?php include 'templates/header.php'; ?>
    <div>
        <div>
            Request Path Info:
            <div><?php echo $data_info['request_path_info']; ?></div>
            Request Content Types:
            <div>
                <?php foreach ($data_info['request_accepted_content_types'] as $content_type): ?>
                    <?php echo $content_type . ';'; ?>
                <?php endforeach; ?>
            </div>

            Request Method:
            <div><?php echo $data_info['request_method']; ?></div>
            Request Encodings:
            <div>
                <?php foreach ($data_info['request_encoding'] as $encoding): ?>
                    <?php echo $encoding . ';'; ?>
                <?php endforeach; ?>
            </div>
        </div>
        <div>
            Response Date:
            <div><?php echo $data_info['date']; ?></div>
            Response Status Code:
            <div><?php echo $data_info['status_code']; ?></div>
            ResponseContent:
        </div>
    </div>
    <div class="container flexbox">
        <?php foreach ($breeds as $breed): ?>
            <div>
                <h3>Name:<?php echo $breed->name; ?></h3>
                <br>
                <p>Description: <?php echo $breed->description; ?></p>
                <br>
                <img src="<?php echo $breed->image->url; ?>" alt="picture of a cat"
                     style="height: 300px; width: 400px">
                <br>
                <a href="<?php echo $breed->wikipedia_url ?>">read more about this breed</a>
            </div>
        <?php endforeach; ?>
    </div>
<?php include 'templates/footer.php'; ?>