<?php if($this->cart->contents()) : ?>
    <form method="post" action="cart/process">
        <table class="table table-striped">
            <tr>
                <th>Quanity</th>
                <th>Item Title</th>
                <th style="text-align:right">Item Price</th>
            </tr>
            <?php $i = 0; ?>
            <?php foreach ($this->cart->contents() as $item): ?>
                <tr>
                    <td><?php echo $item['qty']; ?></td>
                    <td><?php echo $item['name']; ?></td>
                    <td style="text-align:right"><?php echo $this->cart->format_number($item['price']); ?></td>
                </tr>
                <input type="hidden" name="items[<?= $i ?>][item_name]" value="<?= $item['name'] ?>" />
                <input type="hidden" name="items[<?= $i ?>][item_id]" value="<?= $item['id'] ?>" />
                <input type="hidden" name="items[<?= $i ?>][item_qty]" value="<?= $item['qty'] ?>" />
                <?php $i++; ?>
            <?php endforeach; ?>
            <tr>
                <td></td>
                <td class="right"><strong>Shipping</strong></td>
                <td class="right" style="text-align:right"><?php echo $this->config->item('shipping');?></td>
            </tr>
            <tr>
                <td></td>
                <td class="right"><strong>Tax</strong></td>
                <td class="right" style="text-align:right"><?php echo $this->config->item('tax');?></td>
            </tr>
            <tr>
                <td></td>
                <td class="right"><strong>Total</strong></td>
                <td class="right" style="text-align:right">
                    <strong>$<?php echo $this->cart->format_number($this->cart->total()+ $this->config->item('shipping') + $this->config->item('tax')); ?></strong>
                </td>
            </tr>
        </table>
        <br>
        <?php if(!$this->session->userdata('logged_in')) : ?>
        <p><em>You must log in to make purchases. You can create an account, if you don't have one already!</em></p>
        <p><a href="<?php echo site_url('users/register'); ?>" class="btn btn-success">Create An Account</a></p>
		<?php else : ?>
            <h3>Shipping Info</h3>
            <div class="form-group">
                <label>Address</label>
                <input type="text" class="form-control" name="address" required>
            </div>
            <div class="form-group">
                <label>City</label>
                <input type="text" class="form-control" name="city" required>
            </div>
            <div class="form-group">
                <label>State</label>
                <input type="text" class="form-control" name="state" required>
            </div>
            <div class="form-group">
                <label>Country</label>
                <select class="form-control" name="country" required>
                    <option></option>
                    <option>Afghanistan</option>
                    <option>Albania</option>
                    <option>Algeria</option>
                    <option>Andorra</option>
                    <option>Angola</option>
                    <option>Antigua and Barbuda</option>
                    <option>Argentina</option>
                    <option>Armenia</option>
                    <option>Australia</option>
                    <option>Austria</option>
                    <option>Azerbaijan</option>
                    <option>The Bahamas</option>
                    <option>Bahrain</option>
                    <option>Bangladesh</option>
                    <option>Barbados</option>
                    <option>Belarus</option>
                    <option>Belgium</option>
                    <option>Belize</option>
                    <option>Benin</option>
                    <option>Bhutan</option>
                    <option>Bolivia</option>
                    <option>Bosnia and Herzegovina</option>
                    <option>Botswana</option>
                    <option>Brazil</option>
                    <option>Brunei</option>
                    <option>Bulgaria</option>
                    <option>Burkina Faso</option>
                    <option>Burundi</option>
                    <option>Cabo Verde</option>
                    <option>Cambodia</option>
                    <option>Cameroon</option>
                    <option>Canada</option>
                    <option>Central African Republic</option>
                    <option>Chad</option>
                    <option>Chile</option>
                    <option>China</option>
                    <option>Colombia</option>
                    <option>Comoros</option>
                    <option>Congo, Democratic Republic of the</option>
                    <option>Congo, Republic of the</option>
                    <option>Costa Rica</option>
                    <option>Côte d’Ivoire</option>
                    <option>Croatia</option>
                    <option>Cuba</option>
                    <option>Cyprus</option>
                    <option>Czech Republic</option>
                    <option>Denmark</option>
                    <option>Djibouti</option>
                    <option>Dominica</option>
                    <option>Dominican Republic</option>
                    <option>East Timor (Timor-Leste)</option>
                    <option>Ecuador</option>
                    <option>Egypt</option>
                    <option>El Salvador</option>
                    <option>Equatorial Guinea</option>
                    <option>Eritrea</option>
                    <option>Estonia</option>
                    <option>Eswatini</option>
                    <option>Ethiopia</option>
                    <option>Fiji</option>
                    <option>Finland</option>
                    <option>France</option>
                    <option>Gabon</option>
                    <option>The Gambia</option>
                    <option>Georgia</option>
                    <option>Germany</option>
                    <option>Ghana</option>
                    <option>Greece</option>
                    <option>Grenada</option>
                    <option>Guatemala</option>
                    <option>Guinea</option>
                    <option>Guinea-Bissau</option>
                    <option>Guyana</option>
                    <option>Haiti</option>
                    <option>Honduras</option>
                    <option>Hungary</option>
                    <option>Iceland</option>
                    <option>India</option>
                    <option>Indonesia</option>
                    <option>Iran</option>
                    <option>Iraq</option>
                    <option>Ireland</option>
                    <option>Israel</option>
                    <option>Italy</option>
                    <option>Jamaica</option>
                    <option>Japan</option>
                    <option>Jordan</option>
                    <option>Kazakhstan</option>
                    <option>Kenya</option>
                    <option>Kiribati</option>
                    <option>Korea, North</option>
                    <option>Korea, South</option>
                    <option>Kosovo</option>
                    <option>Kuwait</option>
                    <option>Kyrgyzstan</option>
                    <option>Laos</option>
                    <option>Latvia</option>
                    <option>Lebanon</option>
                    <option>Lesotho</option>
                    <option>Liberia</option>
                    <option>Libya</option>
                    <option>Liechtenstein</option>
                    <option>Lithuania</option>
                    <option>Luxembourg</option>
                    <option>Madagascar</option>
                    <option>Malawi</option>
                    <option>Malaysia</option>
                    <option>Maldives</option>
                    <option>Mali</option>
                    <option>Malta</option>
                    <option>Marshall Islands</option>
                    <option>Mauritania</option>
                    <option>Mauritius</option>
                    <option>Mexico</option>
                    <option>Micronesia, Federated States of</option>
                    <option>Moldova</option>
                    <option>Monaco</option>
                    <option>Mongolia</option>
                    <option>Montenegro</option>
                    <option>Morocco</option>
                    <option>Mozambique</option>
                    <option>Myanmar (Burma)</option>
                    <option>Namibia</option>
                    <option>Nauru</option>
                    <option>Nepal</option>
                    <option>Netherlands</option>
                    <option>New Zealand</option>
                    <option>Nicaragua</option>
                    <option>Niger</option>
                    <option>Nigeria</option>
                    <option>North Macedonia</option>
                    <option>Norway</option>
                    <option>Oman</option>
                    <option>Pakistan</option>
                    <option>Palau</option>
                    <option>Panama</option>
                    <option>Papua New Guinea</option>
                    <option>Paraguay</option>
                    <option>Peru</option>
                    <option>Philippines</option>
                    <option>Poland</option>
                    <option>Portugal</option>
                    <option>Qatar</option>
                    <option>Romania</option>
                    <option>Russia</option>
                    <option>Rwanda</option>
                    <option>Saint Kitts and Nevis</option>
                    <option>Saint Lucia</option>
                    <option>Saint Vincent and the Grenadines</option>
                    <option>Samoa</option>
                    <option>San Marino</option>
                    <option>Sao Tome and Principe</option>
                    <option>Saudi Arabia</option>
                    <option>Senegal</option>
                    <option>Serbia</option>
                    <option>Seychelles</option>
                    <option>Sierra Leone</option>
                    <option>Singapore</option>
                    <option>Slovakia</option>
                    <option>Slovenia</option>
                    <option>Solomon Islands</option>
                    <option>Somalia</option>
                    <option>South Africa</option>
                    <option>Spain</option>
                    <option>Sri Lanka</option>
                    <option>Sudan</option>
                    <option>Sudan, South</option>
                    <option>Suriname</option>
                    <option>Sweden</option>
                    <option>Switzerland</option>
                    <option>Syria</option>
                    <option>Taiwan</option>
                    <option>Tajikistan</option>
                    <option>Tanzania</option>
                    <option>Thailand</option>
                    <option>Togo</option>
                    <option>Tonga</option>
                    <option>Trinidad and Tobago</option>
                    <option>Tunisia</option>
                    <option>Turkey</option>
                    <option>Turkmenistan</option>
                    <option>Tuvalu</option>
                    <option>Uganda</option>
                    <option>Ukraine</option>
                    <option>United Arab Emirates</option>
                    <option>United Kingdom</option>
                    <option>United States</option>
                    <option>Uruguay</option>
                    <option>Uzbekistan</option>
                    <option>Vanuatu</option>
                    <option>Vatican City</option>
                    <option>Venezuela</option>
                    <option>Vietnam</option>
                    <option>Yemen</option>
                    <option>Zambia</option>
                    <option>Zimbabwe</option>
                </select>
            </div>
            <div class="form-group">
                <label>Zipcode</label>
                <input type="text" class="form-control" name="zipcode" required>
            </div>
            <p><button class="btn btn-success" type="submit" name="submit">Checkout</button></p>
        <?php endif ?>
    </form>
<?php else : ?>
    <p>There are no items in your cart</p>
<?php endif; ?>
