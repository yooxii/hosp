<div draggable="true" ondragstart="drag(event)">
    <!-- Content of the draggable div -->

</div>

<script>
    function drag(event) {
        event.dataTransfer.setData("text/plain", event.target.id);
    }
</script>

<?php
