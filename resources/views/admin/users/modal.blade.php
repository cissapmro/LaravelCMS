<!-- jQuery Code (to Load Content via Ajax) -->
<script>
    $(document).ready(function(){
        $("#myModal").on("show.bs.modal", function(event){
            // Place the returned HTML into the selected element
            $(this).find(".modal-body").load("remote.php");
        });
    });
</script>

<!-- Button HTML (to Trigger Modal) -->
<button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Excluir</button>

<!-- Modal HTML -->
<div id="myModal" class="modal fade" tabindex="-1">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Ajax Loading Demo</h5>
                <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <div class="modal-body">
                <!-- Content will be loaded here from "remote.php" file -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">OK, Got it!</button>
            </div>
        </div>
    </div>
</div>
