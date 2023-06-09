module.exports = {
    "env": {
        "browser": true,
        "es2021": true
    },
    "extends": "eslint:recommended",
    "overrides": [
    ],
    "parserOptions": {
        "ecmaVersion": "latest",
        "sourceType": "module"
    },
    "rules": {
        semi: ['error', 'always'],  
        quotes: ['error', 'single'],
        indent: ['error', 4], // indentação
        'comma-spacing': ['error', {before: false, after: true}],
    }
}
