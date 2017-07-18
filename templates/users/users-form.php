<?php
    $formElements = [
        [
            'label' => 'Name',
            'type' => 'text',
            'name' => 'name',
            'value' => '',
        ],
        [
            'label' => 'Surame',
            'type' => 'text',
            'name' => 'surname',
            'value' => '',
        ],
        [
            'label' => 'E-mail',
            'type' => 'text',
            'name' => 'email',
            'value' => '',
        ],
        [
            'label' => 'Password',
            'type' => 'password',
            'name' => 'password',
            'value' => '',
        ],
        [
            'label' => '',
            'type' => 'submit',
            'name' => 'submit',
            'value' => 'Save',
        ],
    ];

    if (isset($formElementsValues)) {
        foreach ($formElements as $key => $element) {
            if (isset($formElementsValues[$element['name']])) {
                $formElements[$key]['value'] = $formElementsValues[$element['name']];
            }
        }
    }

    function renderElementRow($label, $type, $name, $value = '', $attribs = [])
    {
        $attribsString = '';

        if (!empty($attribs)) {
            foreach ($attribs as $attrib => $value) {
                $attribsString .= ' ' . $attrib . '="' . $value . '"';
            }
        }
?>
        <tr>
            <td><?php echo (!empty($label)) ? htmlspecialchars($label) . ': ' : ''; ?></td>
            <td><input type="<?php echo htmlspecialchars($type); ?>"
                       name="<?php echo htmlspecialchars($name); ?>"
                       value="<?php echo htmlspecialchars($value); ?>"<?php echo $attribsString; ?> />
            </td>
        </tr>
<?php
    }
?>
<form action="" method="post">
    <table>
        <?php
        foreach ($formElements as $element) {
            renderElementRow(
                $element['label'],
                $element['type'],
                $element['name'],
                !empty($element['value']) ? $element['value'] : '',
                !empty($element['attribs']) ? $element['attribs'] : []
            );
        }
        ?>
    </table>
</form>