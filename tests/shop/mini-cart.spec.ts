import { test, expect, config } from '../utils/setup';

test('Increment', async ({ page }) => {
    await page.goto(`${config.baseUrl}`);
    await page.locator('#main div').filter({ hasText: 'New Products View All New' }).locator('button').first().click();
    await page.getByRole('button', { name: 'Shopping Cart' }).click();
    await page.getByRole('button', { name: 'Increase Quantity' }).click();
    await page.getByRole('button', { name: 'Increase Quantity' }).click();
    await page.waitForSelector('svg.text-blue.animate-spin.font-semibold');
});

test('Decrement', async ({ page }) => {
    await page.goto(`${config.baseUrl}`);
    await page.locator('#main div').filter({ hasText: 'New Products View All New' }).locator('button').nth(2).click();
    await page.getByRole('button', { name: 'Shopping Cart' }).click();
    await page.getByRole('button', { name: 'Increase Quantity' }).click();
    await page.getByRole('button', { name: 'Increase Quantity' }).click();
    await page.getByRole('button', { name: 'Decrease Quantity' }).click();
    await page.getByRole('button', { name: 'Decrease Quantity' }).click();
    await page.getByRole('button', { name: 'Decrease Quantity' }).click();
    await page.waitForSelector('svg.text-blue.animate-spin.font-semibold');
});

test('Remove', async ({ page }) => {
    await page.goto(`${config.baseUrl}`);
    await page.locator('#main div').filter({ hasText: 'New Products View All New' }).locator('button').nth(2).click();
    await page.getByRole('button', { name: 'Shopping Cart' }).click();
    await page.getByRole('button', { name: 'Remove' }).click();
    await page.getByRole('button', { name: 'Agree', exact: true }).click();

    await page.waitForSelector('text=Item is successfully removed from the cart.', { timeout: 5000 });
});
