

<form action="change-p.php" method="post">
        <div class="modal fade" id="passwordModal" tabindex="-1" aria-labelledby="passwordModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="passwordModalLabel">Change password</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>

              </div>
              <div class="modal-body">
                <?php if (isset($_GET['error'])) { ?>
                  <p class="error" style="color:red"><?php echo $_GET['error']; ?></p>
                <?php } ?>
                <a class="dropdown-item d-flex flex-column align-items-left">
                  <label class="change-pass-label">New Password</label>
                  <input type="password" name="np" class="form-control mb-3" placeholder="New Password" class="change-pass-input" required>
                </a>
                <input type="hidden" name="op" placeholder="Old Password">
                <div class="mb-3">
                  <a class="dropdown-item d-flex flex-column align-items-left">
                    <label class="change-pass-label">Confirm New Password</label>
                    <input type="password" name="c_np" class="form-control" placeholder="Confirm New Password" class="change-pass-input" required>
                  </a>

                  <button class="btn btn-primary ml-4 mb-2 mt-4 " style="font-size: 14px;" type="submit">CHANGE</button>


                </div>

              </div>
            </div>
          </div>
        </div>
      </form>