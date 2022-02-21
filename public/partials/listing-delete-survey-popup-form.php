<?php

/**
 * Popup form for takeing survey
 *
 * When user try to delete any listing this form will be poup to take a survey.
 *
 * @link       https://github.com/listing-delete-survey/public/partials
 * @since      1.0.0
 *
 * @package    Listing_Delete_Survey
 * @subpackage Listing_Delete_Survey/public/partials
 */
?>

<div class="modal fade" id="takeASurvey" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLongTitle">Why you want to remove?</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form action="/" id="surveyForm">
      <div class="modal-body">
          <div class="custom-control custom-radio">
            <input type="radio" id="list-1" name="survey-data" value="I no longer wish to sell my item" checked class="custom-control-input">
            <label class="custom-control-label" for="list-1">I no longer wish to sell my item</label>
          </div>
          <div class="custom-control custom-radio">
            <input type="radio" id="list-2" name="survey-data" value="I have sold my item" class="custom-control-input">
            <label class="custom-control-label" for="list-2">I have sold my item</label>
          </div>
      </div>
      <div class="modal-footer">
        <input type="button" class="btn btn-secondary" data-dismiss="modal" value="Close" />
        <input type="submit" id="survey-submit-btn" data-dismiss="modal" class="btn btn-danger btn-sm" value="Submit" />
      </div>
      </form>

    </div>
  </div>
</div>