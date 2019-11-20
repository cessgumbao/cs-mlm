<div id="search_member_modal" class="modal modal-fixed-footer">
    <div class="modal-content">
        <h6><i class="fa fa-search"></i> Search Member</h6>
        <table 
            id="search_member_table" 
            class="table highlight centered"
            data-search="true"
            data-pagination="true"
            data-click-to-select="true"
            data-single-select="true"
            >
            <thead>
                <tr> 
                    <th data-field="state" data-checkbox="true"></th>
                    <th data-field="id" data-visible="false">ID</th>
                    <th data-field="member_id">Member ID</th>
                    <th data-field="first_name">First Name</th>
                    <th data-field="last_name">Last Name</th>
                    <th data-field="city">City</th>
                    <th data-field="region">Region</th>
                </tr>
            </thead>
        </table>
    </div>
    <div class="modal-footer">
        <a href="#!" class="select_member modal-close waves-effect waves-green btn-flat">Select</a>
        <a href="#!" class="modal-close waves-effect waves-green btn-flat">Cancel</a>
    </div>
</div>