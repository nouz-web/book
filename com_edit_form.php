            <form method="POST" action="?tp=<?= $tp ?>">
                <input type="hidden" name="inc" value="add" >
                    <div class="form-group">
                        <label for="f0">Nom d'utilisateur</label>
                        <input name="un" value="<?= $un  ?>" required type="text" class="form-control form-control-sm" id="f0" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="nm">Désignation</label>
                        <input name="nm" value="<?= $nm ?>" required type="text" class="form-control form-control-sm" id="nm" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="f4">Activité</label>
                        <input name="ac" value="<?= $ac ?>" required type="text" class="form-control form-control-sm" id="f4" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="f5">Nature</label>
                        <input name="nt" value="<?= $nt ?>" required type="text" class="form-control form-control-sm" id="f5" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="f6">Téléphone</label>
                        <input name="ph" value="<?= $ph ?>" required type="text" class="form-control form-control-sm" id="f6" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="f7">Adresse</label>
                        <input name="ad" value="<?= $ad ?>" required type="text" class="form-control form-control-sm" id="f7" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="f8">Email</label>
                        <input name="em" value="<?= $em ?>" required type="text" class="form-control form-control-sm" id="f8" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="f9">Instagramme</label>
                        <input name="ig" value="<?= $ig ?>" required type="text" class="form-control form-control-sm" id="f9" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="fb">Facebook</label>
                        <input name="fb" value="<?= $fb ?>" required type="text" class="form-control form-control-sm" id="fb" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="ds">Description</label>
                        <input name="ds" value="<?= $ds ?>" required type="text" class="form-control form-control-sm" id="ds" placeholder="">
                    </div>
                    <div class="form-group">
                        <label for="tg">Tags</label>
                        <input name="tg" value="<?= $tg ?>" required type="text" class="form-control form-control-sm" id="tg" placeholder="">
                    </div>
                <button type="submit" class="btn btn-primary">Appliquer les modifications</button>
            </form>
            <!-- -->