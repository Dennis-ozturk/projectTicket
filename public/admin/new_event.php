<button type="button" class="btn btn-primary alert alert-success" data-toggle="modal" data-target="#addProduct" data-whatever="@mdo">New event</button>

<div class="modal fade" id="addProduct" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add event</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Name of event:</label>
                        <input type="text" class="form-control" name="concertName" />
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Type of concert</label>
                        <select class="form-control" name="concertType">
                            <option value="Fotball">Fotball</option>
                            <option value="Celebrity singer">Celebrity singer</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Arena</label>
                        <select class="form-control" name="concertLocation">
                            <option value="1">Friends Arena</option>
                            <option value="2">Ullevi</option>
                            <option value="3">Tele 2 Arena</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Ticket price each</label>
                        <input type="text" class="form-control" name="priceEach" />
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Which date is the event?</label>
                        <input type="date" class="form-control" name="startDate" />
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">What time is it starting?</label>
                        <input type="time" class="form-control" name="timeStarting" />
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Concert description</label>
                        <textarea type="text" rows="3" cols="50" name="concertDescription"></textarea>
                    </div>
                    <div class="form-group">
                        <label for="message-text" class="col-form-label">Event image</label>
                        <input type="file" class="form-control" name="image" />
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success" name="add">Add Event</button>
                    </div>
                </form>
            </div>
            <?php
            if (isset($_POST['add'])) {
                if (isset($_FILES['image'])) {
                    $folder = "../assets/img/events/";
                    $image = $_FILES['image']['name'];
                    $path = $folder . $image;

                    move_uploaded_file($_FILES['image']['tmp_name'], $path);

                    $fields = [
                        ':concertName' => filter_input(INPUT_POST, 'concertName', FILTER_SANITIZE_STRING),
                        ':concertType' => filter_input(INPUT_POST, 'concertType', FILTER_SANITIZE_STRING),
                        ':concertLocation' => filter_input(INPUT_POST, 'concertLocation', FILTER_SANITIZE_NUMBER_INT),
                        ':priceEach' => filter_input(INPUT_POST, 'priceEach', FILTER_SANITIZE_NUMBER_INT),
                        ':startDate' => filter_input(INPUT_POST, 'startDate', FILTER_SANITIZE_STRING),
                        ':timeStarting' => filter_input(INPUT_POST, 'timeStarting', FILTER_SANITIZE_STRING),
                        ':Img' => $image,
                        ':concertDescription' => filter_input(INPUT_POST, 'concertDescription', FILTER_SANITIZE_STRING)
                    ];
                    $concert->createConcert($fields);
                }
            }

            ?>
        </div>
    </div>
</div>