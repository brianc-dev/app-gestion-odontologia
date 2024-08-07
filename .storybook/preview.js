import '@fontsource-variable/inter';
import {withThemeFromJSXProvider, withThemeByClassName, withThemeByDataAttribute} from '@storybook/addon-themes';
import '../resources/css/app.css';
import StylesDecorator from "./styles-decorator.jsx";
import ZiggyDecorator from "./ZiggyDecorator.jsx";

/** @type { import('@storybook/react').Preview } */
const preview = {
    parameters: {
        layout: 'centered',
        controls: {
            matchers: {
                color: /(background|color)$/i,
                date: /Date$/i,
            },
        },
    },
    argTypes: {
        backgroundColor: { control: 'color' },
    },
    decorators: [
        ZiggyDecorator,
        StylesDecorator,
        // withThemeFromJSXProvider ({
        //     // themes: {
        //     //     light: defaultTheme,
        //     // },
        //     // defaultTheme: 'light',
        //     Provider: ThemeProvider,
        //     GlobalStyles: CssBaseline,
        // }),
        withThemeByClassName({
            themes: {
                light: 'light',
                dark: 'dark',
            },
            defaultTheme: 'light',
        }),
        // withThemeByDataAttribute({
        //     themes: {
        //         light: 'light',
        //         dark: 'dark',
        //     },
        //     defaultTheme: 'light',
        //     attributeName: 'data-mode',
        // }),
    ],
};

export default preview;
