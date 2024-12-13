<div id="modal" class="modal">
    <div class="modal-content animate" style="max-width: 80%; width: fit-content;">
        <div style="display: flex; flex-direction: row; align-items: center; margin-top: 6px;">
            <h3 style="text-align: center; font-weight: 400; color: var(--text-color); margin: 0; padding: 12px;">View and Download <span id="filename"></span></h3>
            <a id="modal-download">
                <div style="background: var(--main-color); border-radius: 30px; margin: auto 16px auto auto; padding: 6px;">
                    <iron-icon icon="icons:file-download" style="color: white; max-width: 20px; max-height: 20px;"></iron-icon>
                </div>                
            </a>
        </div>        
        <div id="modal-data-container" class="container">
            
        </div>
        <div class="container">
            <button type="button" onclick="closeModal()" class="cancelbtn">Close</button>
        </div>
    </div>
</div>