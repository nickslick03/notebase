<div id="modal" class="modal">
    <div class="modal-content animate" style="max-width: 80%; width: fit-content;">
        <!--Header-->
        <div style="display: flex; flex-direction: row; align-items: center; margin-top: 6px;">
            <h3 style="text-align: center; font-weight: 400; color: var(--text-color); margin: 0; padding: 12px;">View and Download <span id="filename"></span></h3>
            <!--Download File-->
            <a id="modal-download">
                <div style="background: var(--main-color); border-radius: 30px;">
                    <iron-icon icon="icons:file-download" style="color: white; width: 20px; height: 20px; margin: 8px;"></iron-icon>
                </div>                
            </a>
        </div>        
        <div id="modal-data-container" class="container">
            
        </div>
        <!--Closes Modal Window-->
        <div class="my-3 d-flex justify-content-center gap-2" id="modal-button-container">
            <button type="button" onclick="closeModal()" class="btn btn-danger">Close</button>
            <button class="btn btn-outline-primary editable">
                <a id="edit-resource-anchor">Edit</a>
            </button>
            <!--Delete Resource-->
            <form action="/resource/delete" method="post">
                @csrf
                <input type="hidden" name="resource" id="delete-resource-field">
                <button class="btn btn-outline-danger editable" type="submit">Delete</button>
            </form>                
        </div>
    </div>
</div>