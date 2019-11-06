const router = require('express').Router();

const controladorImplemento = require('../controllers/controladorImplemento');

router.get('/', controladorImplemento.list);
router.post('/add', controladorImplemento.save);
router.get('/update/:id', controladorImplemento.edit);
router.post('/update/:id', controladorImplemento.update);
router.get('/delete/:id', controladorImplemento.delete);

module.exports = router;