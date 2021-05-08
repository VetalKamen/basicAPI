<?php
require_once dirname(__DIR__) . '/Controller/CatSearchController.php';

$cat       = '';
$mime_type = '';
$page      = 1;
$breed     = '';

if (isset($_GET['category']) && ! empty($_GET['category'])) {
    $cat = $_GET['category'];
}
if (isset($_GET['mime_type']) && ! empty($_GET['mime_type'])) {
    $mime_type = $_GET['mime_type'];
}
if (isset($_GET['page']) && ! empty($_GET['page'])) {
    $page = $_GET['page'];
}
if (isset($_GET['breed']) && ! empty($_GET['breed'])) {
    $breed = $_GET['breed'];
}
$data_info = $cat_search_controller->default_search($breed, $cat, $mime_type, $page);
$content   = $data_info['content'];

$response_decoded = \json_decode($content);

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
        <?php foreach ($response_decoded as $value) : ?>
            <div>
                <img src="<?php echo $value->url; ?>" alt="picture of a cat" style="height: 300px; width: 400px">
            </div>
        <?php endforeach; ?>
        <div class="flex">
            Search By:
            <form>
                Filetype:
                <select name="mime_type">
                    <option value="" selected>Choose</option>
                    <option value="gif">gif</option>
                    <option value="jpg">jpg</option>
                    <option value="png">png</option>
                </select>
                Category:
                Page:
                <input type="text" name="page" placeholder="Preferable Page Number(default = 1)">
                Breed:
                <input type="text" name="breed" maxlength="4" placeholder="Enter Breed's id for the catAPI">

                <button type="submit">Search</button>
            </form>
        </div>
    </div>
<?php include 'templates/footer.php'; ?>