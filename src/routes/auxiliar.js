const router = require('express').Router();

const controladorAuxiliar = require('../controllers/controladorAuxiliar');

router.get('/', controladorAuxiliar.list);
router.post('/add', controladorAuxiliar.save);
router.get('/update/:id', controladorAuxiliar.edit);
router.post('/update/:id', controladorAuxiliar.update);
router.get('/delete/:id', controladorAuxiliar.delete);

module.exports = router;