/** @type {import('stylelint').Config} */
export default {
    defaultSeverity: 'warning',
    plugins: ['stylelint-rem-over-px'],
    extends: ['stylelint-config-standard-scss'],
    rules: {
        indentation: 4,
        'no-empty-source': null,
        'rem-over-px/rem-over-px': [
            true,
            {
                fontSize: 10,
                ignore: ['-1px', '440px', '744px', '1140px', '1440px', '1728px'],
                ignoreProperties: ['top', 'left', 'right', 'bottom', 'transform'],
                ignoreFunctions: ['url', 'clamp-calc'],
                ignoreAtRules: ['media'],
            },
        ],
    },
};
