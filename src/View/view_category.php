<?php
require_once dirname(__DIR__) . '/Controller/CatController.php';

$data_info = $cat_controller->listCategories();
$content   = $data_info['content'];

$categories = \json_decode($content);

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
        All available categories:
        <?php foreach ($categories as $category): ?>
            <div>
                <h3><?php echo $category->name; ?></h3>
            </div>
        <?php endforeach; ?>
    </div>
<?php include 'templates/footer.php'; ?>